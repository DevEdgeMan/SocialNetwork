<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $fillable = [
        'requester', 'user_requested', 'status'
    ];

    public function usersent() {
        return $this->belongsTo('App\User', 'requester');
    }

    public function userreceived() {
        return $this->belongsTo('App\User', 'user_requested');
    }
}
