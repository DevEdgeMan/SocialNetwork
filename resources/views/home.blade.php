@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
    </ol>
</div>

<div class="container col-md-10 col-md-offset-1" id="app"> 
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body sidebar">
                    <h4 align="center">Left Sidebar</h4>
                    <hr>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">@{{editpost}}</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{url('../')}}/img/{{Auth::user()->pic}}" width="50px" height="50px" class="img-rounded"/>
                        </div>
                        <div class="col-md-11">
                            <form method="POST" v-on:submit.prevent="addPost">
                                <textarea v-model="content" class="form-control" rows="3"></textarea>
                                <br>
                                <input type="submit" class="btn btn-info btn-sm pull-right" value="Post">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Recent Posts</div>

                <div class="panel-body">
                    <div v-for="post in posts">
                        <div class="row">
                            <div class="col-md-2 pull-left">
                                <img :src="'{{url('../')}}/img/' + post.user.pic"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-10 pull-left">
                                <h3 style="margin:0px;"><a :href="'{{url('/profile')}}/' + post.user.slug">
                                    @{{post.user.name}}</a></h3>
                                <p><i class="fa fa-globe"></i> @{{post.profile.city}} - @{{post.profile.country}}</p>
                                <small>
                                    <b>posted:</b> 
                                    @{{post.created_at}}
                                </small>
                            </div>
                        </div>
                        <hr>
                        <div class="row post">
                            <div class="col-md-12">
                                <p>@{{post.content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
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

@section('style')
<style>
.panel .panel-heading {
    background-color:#efeff5;
}
.panel .panel-body .post {
    border-bottom:2px solid #ccc;
    padding-bottom:5px;
    margin-bottom:20px;
}
.panel .sidebar {
    min-height:600px;
}
</style>
@endsection