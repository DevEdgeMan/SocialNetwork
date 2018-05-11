<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'content', 'status'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'user_id', 'user_id');
    }
}
