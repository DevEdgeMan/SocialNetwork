<?php

namespace App\Traits;

use App\Friendship;

trait Friendable
{
    public function test() {
        return 'hi';
    }

    public function addFriend($user_id) {
        //return 'adding friend';

        $friendship = Friendship::create([
            'requester' => $this->id,
            'user_requested' => $user_id,
            'status' => false,
        ]);

        if ($friendship)
            return back()->with('success', 'Request sended');
            //return $friendship;
        
        return 'failed';
    }

    public function checkFriendship($user_id) {
        $check = Friendship::where('requester', $this->id)
                           ->where('user_requested', $user_id)
                           ->first();

        /*if ($check)
            return true;
        
        return false;*/
        return $check;
    }
}