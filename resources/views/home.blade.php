@extends('layouts.app')

@section('content')
<div class="container col-md-10 col-md-offset-1">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
    </ol>
    
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body sidebar" id="app">
                    <h4 align="center">Left Sidebar</h4>
                    <hr>
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Edit New Post</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img src="{{url('../')}}/img/marc.jpg" width="50px" height="50px" class="img-rounded"/>
                        </div>
                        <div class="col-md-11">
                            <textarea class="form-control" rows="3"></textarea>
                            <br>
                            <input type="submit" class="btn btn-info btn-sm pull-right" value="Post">
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Recent Posts</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 pull-left">
                            <img src="{{url('../')}}/img/julie.jpg"
                            width="80px" height="80px" class="img-rounded"/>
                        </div>

                        <div class="col-md-10 pull-left">
                            <h3 style="margin:0px;"><a href="{{url('/profile')}}/ivica-pribojac">
                                Lara Jovic</a></h3>
                            <p><i class="fa fa-globe"></i> New York - USA</p>
                            <small>
                                <b>posted:</b> 
                                <?php
                                    $date = date_create('2018-05-09 10:36:28');
                                    echo strtolower(date_format($date, 'd. F Y. \a\t H:i'));
                                ?>
                            </small>
                        </div>
                    </div>
                    <hr>
                    <div class="row post">
                        <div class="col-md-12">
                            <p>This is my post. I'm Lara Jovic</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-2 pull-left">
                            <img src="{{url('../')}}/img/mike.jpg"
                            width="80px" height="80px" class="img-rounded"/>
                        </div>

                        <div class="col-md-10 pull-left">
                            <h3 style="margin:0px;"><a href="{{url('/profile')}}/ivica-pribojac">
                                Janko Jankovic</a></h3>
                            <p><i class="fa fa-globe"></i> Barselona - Spain</p>
                            <small>
                                <b>posted:</b> 
                                <?php
                                    $date = date_create('2018-05-07 17:21:43');
                                    echo strtolower(date_format($date, 'd. F Y. \a\t H:i'));
                                ?>
                            </small>
                        </div>
                    </div>
                    <hr>
                    <div class="row post">
                        <div class="col-md-12">
                            <p>Hello everyone, I'm Janko and I'm accountant from Spain</p>
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
    min-height:500px;
}
</style>
@endsection