<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    // use SoftDeletes;

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

     /**
     * Relationship morphMany with Comment
     *
     * @return array
     */
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    public function like()
     {
        return $this->hasMany('App\Like');
     } 
     public function likeByUser()
     {
        return $this->hasMany('App\Like')->where('user_id', Auth::user()->id);
     } 

    /**
     * Override parent boot and Call deleting borrows and comments
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }

}
