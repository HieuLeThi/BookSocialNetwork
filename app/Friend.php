<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function friends()
	{
    	return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id');
	}
	protected $fillable = [
        'user_id', 'friend_id', 'status'
    ];
    public function friendReq()
	{
    	return $this->belongsTo('App\User', 'user_id');
	}
}
