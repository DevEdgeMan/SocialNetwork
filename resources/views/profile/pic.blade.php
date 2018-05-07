@extends('profile.master')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('profile', Auth::user()->slug) }}">Profile</a></li>
        <li><a href="{{ route('editProfile') }}">Edit Profile</a></li>
        <li><a href="#">Change Image</a></li>
    </ol>

    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{ Auth::user()->name }}</div>

                <div class="panel-body">
                    
                    Change your image
                    <br/><br/>
                    <img src="{{url('/img/' . Auth::user()->pic) }}" width="100px" height="100px"/>
                    <br/>
                    
                    <form action="{{ route('uploadImage') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="file" class="form-control" name="pic"/>
                        <input type="submit" class="btn btn-success" name="btn"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection