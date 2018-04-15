<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'user_id', 'book_id', 'content', 'role_post'
    ];
}
