@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="#">Profile</a></li>
    </ol>

    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            @foreach ($users as $user)
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}, View Profile</div>

                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{url('../img/' . $user->pic) }}" class="img-circle"/>
                                <div class="caption">
                                    <h3 align="center">{{ ucwords($user->name) }}</h3>
                                    <p align="center">{{ $user->profile->city }} - {{ $user->profile->country }}</p>
                                    @if ($user->id == Auth::user()->id)
                                    <p align="center"><a href="{{ route('editProfile') }}" class="btn btn-primary" role="button">Edit Profile</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <h4>About</h4>
                            <hr/>
                            <p>{{ $user->profile->about }}</p>
                        </div>
                    </div>

                    <!--Welcome to your profile
                    <br/><br/>
                    <img src="{{url('/img/' . Auth::user()->pic) }}" width="80px" height="80px"/>
                    <br/>
                    <a href="{{ route('changeImage') }}">Change Image</a-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
