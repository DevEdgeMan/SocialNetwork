@extends('layouts.msg')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="#">Messages</a></li>
    </ol>
</div>
    
<div class="container col-md-12" id="app">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body sidebar">
                    <h4 align="center">@{{friends}}</h4>
                    <hr>
                    <div>
                        <li @click="messages(friend.id)" v-for="friend in allFriends" style="list-style:none; margin-top:10px; background-color:#F3F3F3" class="row">
                            <div class="col-md-3 pull-left">
                                <img :src="'{{url('../')}}/img/' + friend.pic" style="width:50px; border-radius:100%; margin:5px"/>
                            </div>
                            <div class="col-md-9 pull-left" style="margin-top:5px;">
                                <b>@{{ friend.name }}</b><br>
                                <small>Gender: @{{friend.gender}}
                            </div>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>

                <div v-if="allMessages.length == 0" class="panel-body">
                    <p>Messages go here</p>
                </div>

                <div v-if="allMessages=='No messages!'" class="panel-body">
                    <p>No Messages!!!</p>
                </div>
                
                <div v-for="message in allMessages" class="panel-body">
                    <p v-if="message.user_from == {{Auth::user()->id}}" style="background-color:lightgrey;">@{{message.user_from}} said: @{{message.content}}</p>
                    <p v-if="message.user_from != {{Auth::user()->id}}" style="background-color:lightblue;">@{{message.user_from}} said: @{{message.content}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body sidebar">
                    <h4 align="center">Right Sidebar</h4>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection