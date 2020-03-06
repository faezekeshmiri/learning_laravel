<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //
	public function members()
    {
        return $this->belongsToMany('App\User', 'channel_members', 'channel_id', 'member_id');
    }
	
	public function admins()
    {
        return $this->belongsToMany('App\User', 'channel_admins', 'channel_id', 'admin_id');
    }
}
