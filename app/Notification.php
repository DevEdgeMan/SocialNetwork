<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'from_user', 'to_user', 'note', 'status'
    ];
}
