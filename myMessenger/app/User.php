<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'phone_number', 'password', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_number_verified_at' => 'datetime',
    ];
	
	public function messags()
    {
        return $this->hasMany('App\Message');
    }
	public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_members', 'group_id', 'member_id');
    }
	
	public function groupAdmins()
    {
        return $this->belongsToMany('App\Group', 'group_admins', 'group_id', 'admin_id');
    }
	
	public function channels()
    {
        return $this->belongsToMany('App\Channel', 'channel_members', 'channel_id', 'member_id');
    }
	
	public function channelAdmins()
    {
        return $this->belongsToMany('App\Channel', 'channel_admins', 'channel_id', 'admin_id');
    }
	
	public function recievedMessages()
    {
        return $this->belongsToMany('App\Message', 'user_messages', 'message_id', 'user_id');
    }
}
