<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role' ,'avatar_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function checkDefaultImage($image)
    {
        $arrUrl = explode('/', $image);
        $image = end($arrUrl);

        return ($image == config('image.book.default_name_image')) ? null : $image;
    }
    public function bookByAuthor()
    {
        return $this->hasMany('App\Book', 'author', 'id') ->where('status', '1')->limit(4);
    }
    public function totalFriend()
    {
        return $this->hasMany('App\Friend')->where('status', 2);
    }

    public function totalPost()
    {
        return $this->hasMany('App\Post')->where('role_post', 1);
    }
    public function hasRating()
    {
        return $this->hasMany('App\Rating')->where('rating', 1);
    }
}
