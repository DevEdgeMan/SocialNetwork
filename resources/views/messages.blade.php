@extends('layouts.msg')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="#">Messages</a></li>
    </ol>
</div>
    
<div class="container col-md-10 col-md-offset-1" id="app">
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
                
                <div class="panel-body">
                    <div v-if="allMessages!='No messages!'" v-for="message in allMessages" class="col-md-8 col-md-offset-2" style="margin-top:15px;">
                        <p class="col-md-6 pull-right" v-if="message.user_from == {{Auth::user()->id}}" align="right">
                            <span style="padding:15px; border-radius:15px; background-color:#F0F0F0; color:#333">
                                @{{message.content}}
                            </span>
                        </p>
                        <p class="col-md-6 pull-left" v-if="message.user_from != {{Auth::user()->id}}" align="left">
                            <span style="padding:15px; border-radius:15px; background-color:#0084FF; color:#fff">
                                @{{message.content}}
                            </span>
                        </p>
                    </div>
                </div>

                <div v-if="userTo != 0" class="panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <textarea @keyup="inputContent" v-model="content" class="form-control" rows="2" placeholder="Type your message here"></textarea>
                    <br>
                </div>
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