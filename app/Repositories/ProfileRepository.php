<?php

namespace App\Repositories;

use App\Profile;
use App\User;
use App\Friendship;

class ProfileRepository
{
    private static $instance;

    protected function __construct() {
        //Do nothing
    }

    public static function instance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function getFriends($fr1, $fr2) {
        $users = collect(new User);
        foreach ($fr1 as $fr)
        {
            $users = $users->concat([$fr->userreceived]);
        }
        foreach ($fr2 as $fr)
        {
            $users = $users->concat([$fr->usersent]);
        }
        return $users->all();
    }
}