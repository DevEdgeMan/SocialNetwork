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
                <div class="panel-heading">My Friends</div>

                <div class="panel-body">
                    @if ($allFriends)
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
                                    <a href="{{ route('removeFriend', $friend->id) }}" class="btn btn-info btn-sm">Unfriend</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <p>You currently don't have any friends</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
