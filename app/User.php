<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Traits\Friendable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'slug', 'pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function sentnoti() {
        return $this->hasMany('App\Notification', 'from_user');
    }

    public function receivednoti() {
        return $this->hasMany('App\Notification', 'to_user');
    }

    public function sentreq() {
        return $this->hasMany('App\Friendship', 'requester');
    }

    public function receivedreq() {
        return $this->hasMany('App\Friendship', 'user_requested');
    }
}
