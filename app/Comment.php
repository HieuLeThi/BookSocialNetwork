<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'post_id'
    ];

    public function post()
     {
        return $this->belongsTo('App\Post');
     }

    public function userComment()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
}
