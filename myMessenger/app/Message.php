<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $guarded = [];
	
	public function file(){
		return $this->belongsTo(App\File);
	}
	
	public function sender(){
		return $this->belongsTo(App\User);
	}
	
	public function recievers()
    {
        return $this->belongsToMany('App\User', 'user_messages', 'message_id', 'user_id');
    }
    
}
