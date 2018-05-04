<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusBook extends Model
{
    protected $table = 'statusbooks';
    protected $fillable = [
        'user_id', 'book_id', 'status'
    ];
}
