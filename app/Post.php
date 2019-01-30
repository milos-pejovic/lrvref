<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];
    // protected $guarded = ['user_id'];

    /**
     * 
     */
    public function addComment($body) {

        // Behind the scene sets the id of the Post for the new comment.
        $this->comments()->create(compact('body'));
    }

    /**
     * 
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * 
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * 
     */
    public static function archives() {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at)')
        ->get()
        ->toArray();
    }

    /**
     * 
     */
    public function scopeFilter($query, $filters) {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    /**
     * 
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
