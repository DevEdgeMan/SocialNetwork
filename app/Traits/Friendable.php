<?php

namespace App\Traits;

use App\Friendship;
use App\Notification;

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
        {
            Notification::create([
                'from_user' => $this->id,
                'to_user' => $user_id,
                'note' => '<b style=\'color:green;\'>' . $this->name . '</b> sent you a friend request',
                'status' => true
            ]);

            return back()->with('success', 'Request sended');
            //return $friendship;
        }

        return 'failed';
    }

    public function confirmRequest($user_id) {
        Friendship::where('user_requested', $this->id)
                  ->where('requester', $user_id)
                  ->update(['status' => true]);

        Notification::create([
            'from_user' => $this->id,
            'to_user' => $user_id,
            'note' => '<b style=\'color:green;\'>' . $this->name . '</b> accepted your friend request',
            'status' => true
        ]);

        return back()->with('success', 'Request accepted');
    }

    /*public function checkFriendship($user_id) {
        $check = Friendship::where('requester', $this->id)
                           ->where('user_requested', $user_id)
                           ->first();

        /*if ($check)
            return true;
        
        return false;
        return $check;
    }*/

    public function checkFriendship($user_id) {
        $checkRequester = Friendship::where('requester', $this->id)
                           ->where('user_requested', $user_id)
                           ->first();

        $checkRequested = Friendship::where('user_requested', $this->id)
                            ->where('requester', $user_id)
                            ->first();

        if ($checkRequester)
            return 'Request Sent';
        else if ($checkRequested)
            return 'Sent you a Request';
        else
            return '';
    }
}