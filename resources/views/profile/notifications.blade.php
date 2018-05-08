@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
    </ol>

    <div class="row">
        @include('layouts.sidebar')
        
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">My Notifications</div>

                <div class="panel-body">
                    <ul>
                        @foreach($notis as $noti)
                            <li>{!! $noti->note !!}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
