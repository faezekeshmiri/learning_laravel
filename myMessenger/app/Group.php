<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
	public function members()
    {
        return $this->belongsToMany('App\User', 'group_members', 'group_id', 'member_id');
    }
	
	public function admins()
    {
        return $this->belongsToMany('App\User', 'group_admins', 'group_id', 'admin_id');
    }
}
