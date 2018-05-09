@extends('layouts.app')

@section('content')
<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('profile', Auth::user()->slug) }}">Profile</a></li>
        <li><a href="#">My Friends</a></li>
    </ol>

    


    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">My Friends --version 1--</div>

                <div class="panel-body">
                    @foreach($friends1 as $friend)
                        <?php
                            $testuser = $friend->usersent;
                            if ($friend->requester == Auth::user()->id)
                                $testuser = $friend->userreceived;
                        ?>
                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/img/{{$testuser['pic']}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$testuser['slug']}}">
                                    {{ucwords($testuser['name'])}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$testuser->profile['city']}}  - {{$testuser->profile['country']}}</p>
                                <p>{{$testuser->profile['about']}}</p>
                            </div>

                            <div class="col-md-3 pull-right">
                                <p class="pull-right">
                                    <a href="#" class="btn btn-info btn-sm">Unfriend</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
<br><br><br>
                <div class="panel-heading">My Friends --version 2--</div>

                <div class="panel-body">
                    @foreach($friends1 as $friend)
                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/img/{{$friend->userreceived['pic']}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$friend->userreceived['slug']}}">
                                    {{ucwords($friend->userreceived['name'])}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$friend->userreceived->profile['city']}}  - {{$friend->userreceived->profile['country']}}</p>
                                <p>{{$friend->userreceived->profile['about']}}</p>
                            </div>

                            <div class="col-md-3 pull-right">
                                <p class="pull-right">
                                    <a href="#" class="btn btn-info btn-sm">Unfriend</a>
                                </p>
                            </div>
                        </div>
                    @endforeach

                    @foreach($friends2 as $friend)
                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/img/{{$friend->usersent['pic']}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$friend->usersent['slug']}}">
                                    {{ucwords($friend->usersent['name'])}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$friend->usersent->profile['city']}}  - {{$friend->usersent->profile['country']}}</p>
                                <p>{{$friend->usersent->profile['about']}}</p>
                            </div>

                            <div class="col-md-3 pull-right">
                                <p class="pull-right">
                                    <a href="#" class="btn btn-info btn-sm">Unfriend</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
<br><br><br>
                <div class="panel-heading">My Friends --version 3--</div>

                <div class="panel-body">
                    @foreach($allFriends as $friend)
                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/img/{{$friend->pic}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$friend->slug}}">
                                    {{ucwords($friend->name)}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$friend->profile['city']}}  - {{$friend->profile['country']}}</p>
                                <p>{{$friend->profile['about']}}</p>
                            </div>

                            <div class="col-md-3 pull-right">
                                <p class="pull-right">
                                    <a href="#" class="btn btn-info btn-sm">Unfriend</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
