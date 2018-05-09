<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'from_user', 'to_user', 'note', 'status'
    ];

    public function usersent() {
        return $this->belongsTo('App\User', 'from_user');
    }

    public function userreceived() {
        return $this->belongsTo('App\User', 'to_user');
    }
}
