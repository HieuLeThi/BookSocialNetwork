<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [
        'user_id', 'book_id', 'content', 'role_post'
    ];
    public function book()
    {
    	return $this->hasMany('App\Book', 'id', 'book_id');
    }
    public function user()
    {
    	return $this->hasMany('App\User', 'id', 'user_id');
    }
}
