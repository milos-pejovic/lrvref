<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    protected $fillable = ['first_name', 'last_name', 'about'];

    /**
     * 
     */
    public function books() {
        return $this->hasMany(Book::class);
    }

    /**
     * 
     */
    public function addBook($data) {
        $this->books()->create($data);
    }
}
