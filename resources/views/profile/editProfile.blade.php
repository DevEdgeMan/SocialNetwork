@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('profile', Auth::user()->slug) }}">Profile</a></li>
        <li><a href="#">Edit Profile</a></li>
    </ol>

    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>

                <div class="panel-body">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{url('../img/' . Auth::user()->pic) }}" class="img-circle"/>
                            <div class="caption">
                                <h3 align="center">{{ ucwords(Auth::user()->name) }}</h3>
                                <p align="center">{{ Auth::user()->profile->city }} - {{ Auth::user()->profile->country }}</p>
                                <p align="center"><a href="{{ route('changeImage') }}" class="btn btn-primary" role="button">Change Image</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8">
                        <h3>Update your profile</h3>
                        <hr>
                        <!--div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                        </div-->

                        <form method="post" action="{{ route('updateProfile') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="city" class="control-label">City</label>
                                <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->profile->city }}">
                            </div>

                            <div class="form-group">
                                <label for="country" class="control-label">Country</label>
                                <input id="country" type="text" class="form-control" name="country" value="{{ Auth::user()->profile->country }}">
                            </div>

                            <div class="form-group">
                                <label for="about" class="control-label">About</label>
                                <textarea id="about" type="text" class="form-control" name="about" rows="3">{{ Auth::user()->profile->about }}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update Profile">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
