<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return Auth::user()->test();
});

Auth::routes();

/*Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
});*/

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{slug}', 'ProfileController@index')->name('profile');
    Route::get('/changeImage', function() {
        return view('profile.pic');
    })->name('changeImage');
    Route::post('/uploadImage', 'ProfileController@uploadImage')->name('uploadImage');
    Route::get('/editProfile', function() {
        //$profile = Auth::user()->profile;
        return view('profile.editProfile'/*, ['profile' => $profile]*/);
    })->name('editProfile');
    Route::post('/updateProfile', 'ProfileController@updateProfile')->name('updateProfile');

    Route::get('/findFriends', 'ProfileController@findFriends')->name('findFriends');
    Route::get('/addFriend/{user_id}', function($id) {
        return Auth::user()->addFriend($id);
    })->name('addFriend');
    Route::get('/removeFriend/{user_id}', function($id) {
        return Auth::user()->removeFriend($id);
    })->name('removeFriend');
    Route::get('/friendRequests', 'ProfileController@friendRequests')->name('friendRequests');
    Route::get('/confirmRequest/{user_id}', function($id) {
        return Auth::user()->confirmRequest($id);
    })->name('confirmRequest');
    Route::get('/removeRequests/{user_id}', function($id) {
        return Auth::user()->removeRequests($id);
    })->name('removeRequests');
    Route::get('/friends', 'ProfileController@friends')->name('friends');

    Route::get('/notifications/{id}', 'ProfileController@notifications')->name('notifications');

    Route::post('/addPost', 'PostController@addPost')->name('addPost');
    Route::get('/posts', 'PostController@posts')->name('posts');

    Route::get('/messages', function() {
        return view('messages');
    })->name('messages');
    Route::get('/getMessages', 'MessageController@getMessages')->name('getMessages');
    Route::get('/getMessage/{id}', 'MessageController@getMessage')->name('getMessage');
});
