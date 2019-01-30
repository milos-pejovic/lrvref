<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 
     */
    // public static function incomplete() {
    //     return static::where('completed', 0)->get();
    // }


    /**
     * Scope
     */
    public function scopeIncomplete($query, $val = null) {
        return $query->where('completed', 0);
    }

}
