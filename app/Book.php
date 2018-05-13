<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Libraries\Traits\SearchTrait;

class Book extends Model
{
    use SearchTrait;
    protected $fillable = [
        'title', 'topic_id', 'author', 'description', 'more_description', 'isbn' ,'picture', 'status'
    ];

    /**
     * Check default image
     *
     * @param string $image path of image
     *
     * @return string
     */
    public static function checkDefaultImage($image)
    {
        $arrUrl = explode('/', $image);
        $image = end($arrUrl);

        return ($image == config('image.book.default_name_image')) ? null : $image;
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function rate()
    {
        return $this->hasMany('App\Rating', 'book_id')->where('rating', '1');
    }
    public function posts()
    {
        return $this->hasMany('App\Post', 'book_id');
    }
    /**
     * Override parent boot and Call deleting borrows and comments
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($book) {
            // $book->posts()->delete();
            // $book->comments()->delete();
        });
    }
}
