<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'topic_id', 'author', 'description', 'more_description', 'isbn' ,'picture'
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
}
