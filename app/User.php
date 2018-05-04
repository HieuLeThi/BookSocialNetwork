<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->hasMany('App\Book', 'author', 'id');
    }
}
