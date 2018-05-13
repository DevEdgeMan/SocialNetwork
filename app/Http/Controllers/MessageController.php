<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProfileRepository;
use Auth;
use DB;

class MessageController extends Controller
{
    public function getMessages() {
        $user = Auth::user();
        $friends1 = $user->sentreq->where('status', true);
        $friends2 = $user->receivedreq->where('status', true);
        $allFriends = ProfileRepository::instance()->getFriends($friends1, $friends2);
        return $allFriends;
    }

    public function getMessage($id) {
        $checkConv = DB::table('conversations')
                            ->where(function($query) use ($id) {
                                $query->where('user_one', Auth::user()->id)
                                      ->where('user_two', $id);
                            })
                            ->orWhere(function($query) use ($id) {
                                $query->where('user_two', Auth::user()->id)
                                      ->where('user_one', $id);
                            })
                            ->get();
        /*$checkConv = DB::table('conversations')
                            ->where('user_one', Auth::user()->id)
                            ->where('user_two', $id)
                            ->get();*/
        if ($checkConv->count() > 0) {
            $messages = DB::table('messages')
                            ->where('conversation_id', $checkConv[0]->id)
                            ->get();
            return $messages;
        } else {
            return 'No messages!';
        }
    }
}
