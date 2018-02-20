<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 
        'author', 
        'publish_date', 
        'language', 
        'original_language'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
