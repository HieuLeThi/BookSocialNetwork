<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    
    public function relateBook()
    {
    	return $this->hasMany('App\Book')->where('status', '1');
    }
}
