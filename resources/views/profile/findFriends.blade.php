@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('profile', Auth::user()->slug) }}">Profile</a></li>
        <li><a href="#">Find Friends</a></li>
    </ol>

    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Add some friends</div>

                <!--div class="panel-body">
                    @foreach($allUsers as $user)
                        <div class="thumbnail col-md-4">
                            <div class="col-md-3">
                                <img src="{{url('/img/' . $user->pic) }}" width="50px" height="50px" class="img-circle pull-left"/>
                            </div>
                            <div class="col-md-9">
                                <h4>{{ $user->name }}</h4>
                                <p>{{ $user->profile->city }} - {{ $user->profile->country }}</p>
                            </div>
                            <div class="caption">
                                <p><a href="{{ route('addFriend', $user->id) }}" class="btn btn-success btn-sm pull-right">Add Friend</a></p>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-sm-6 col-md-8">

                    </div>
                </div-->


                <div class="panel-body">
                    <!--div class="col-sm-12 col-md-12"-->
                        @foreach($allUsers as $user)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('/img/' . $user->pic) }}" width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{url('/profile')}}/{{$user->slug}}">
                                  {{ucwords($user->name)}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$user->profile->city}}  - {{$user->profile->country}}</p>
                                <p>{{$user->profile->about}}</p>

                            </div>

                            <div class="col-md-3 pull-right">
                                @if (Auth::user()->checkFriendship($user->id) == '')
                                    <p>
                                        <a href="{{url('/')}}/addFriend/{{$user->id}}"
                                           class="btn btn-info btn-sm">Add to Friend</a>
                                    </p>
                                @else
                                    <p>
                                        {{ Auth::user()->checkFriendship($user->id) }}
                                    </p>
                                @endif
                            </div>

                        </div>
                        @endforeach
                    <!--/div-->
                </div>
            </div>
        </div>
    </div>

<!--
    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                        <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!--div class="row">
        <div class="col-md-6">
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                    <div role="tabpanel" class="tab-pane" id="messages">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                    <div role="tabpanel" class="tab-pane" id="settings">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
                </div>
            </div>
        </div>
    </div-->
</div>
@endsection
