<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notification;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function index($slug) {
        $users = User::where('slug', $slug)->get();
        return view('profile.index', ['users' => $users]);
    }

    public function uploadImage(Request $request) {
        //dd($request->all());
        $file = $request->file('pic');
        $file_name = $file->getClientOriginalName();
        $file_path = 'img';
        $file->move($file_path, $file_name);

        $user_id = Auth::user()->id;
        DB::table('users')->where('id', Auth::user()->id)->update(['pic' => $file_name]);
        //User::where('id', $user_id)->update(['pic' => $file_name]);

        //return view('profile.index');
        //return redirect()->route('changeImage');
        return back();
    }

    public function updateProfile(Request $request) {
        //dd($request->all());

        DB::table('profiles')->where('user_id', Auth::user()->id)
                             ->update($request->except('_token'));
        
        return redirect()->route('profile', Auth::user()->slug);
    }

    public function findFriends() {
        $uid = Auth::user()->id;
        //$allUsers = DB::table('users')->where('id', '!=', $uid)->get();
        $allUsers = User::where('id', '!=', $uid)->get();

        return view('profile.findFriends', ['allUsers' => $allUsers]);
    }

    public function friends() {
        $uid = Auth::user()->id;

        $friends1 = User::rightJoin('friendships', 'users.id', 'friendships.requester')
                        ->select('users.*')
                        ->where('friendships.user_requested', $uid)
                        ->where('status', true)
                        ->get();
        $friends2 = User::rightJoin('friendships', 'users.id', 'friendships.user_requested')
                        ->select('users.*')
                        ->where('friendships.requester', $uid)
                        ->where('status', true)
                        ->get();
        $friends = $friends1->merge($friends2);

        return view('profile.friends', ['friends' => $friends]);
    }

    public function friendRequests() {
        $uid = Auth::user()->id;

        //$requests = Friendship::where('user_requsted', $uid)->get();

        /*$requests = DB::table('friendships')->leftJoin('users', 'friendships.requester', 'users.id')
                                            ->where('friendships.user_requested', $uid)
                                            ->where('status', false)
                                            ->get();*/
        $requests = User::rightJoin('friendships', 'users.id', 'friendships.requester')
                        ->select('users.*')
                        ->where('friendships.user_requested', $uid)
                        ->where('status', false)
                        ->get();

        $sendrequests = User::rightJoin('friendships', 'users.id', 'friendships.user_requested')
                        ->select('users.*')
                        ->where('friendships.requester', $uid)
                        ->where('status', false)
                        ->get();

        $friends1 = User::rightJoin('friendships', 'users.id', 'friendships.requester')
                        ->select('users.*')
                        ->where('friendships.user_requested', $uid)
                        ->where('status', true)
                        ->get();
        $friends2 = User::rightJoin('friendships', 'users.id', 'friendships.user_requested')
                        ->select('users.*')
                        ->where('friendships.requester', $uid)
                        ->where('status', true)
                        ->get();
        $friends = $friends1->merge($friends2);

        return view('profile.friendRequests', ['requests' => $requests,
                                               'sendrequests' => $sendrequests,
                                               'friends' => $friends]);
    }

    public function notifications($noti_id) {
        $notis = Notification::where('id', $noti_id)->get();

        Notification::where('id', $noti_id)->update(['status' => false]);

        return view('profile.notifications', ['notis' => $notis]);
    }
}
