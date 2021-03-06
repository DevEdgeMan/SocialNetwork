<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://use.fontawesome.com/595a5020bd.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'LaraBook') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @auth
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('findFriends') }}">Find Friends</a></li>
                            <li><a href="{{ route('friendRequests') }}">My Requests</a></li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <a href="{{ route('friends') }}">
                                    <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                                </a>
                            </li>

                            <?php
                                $notis = App\Notification::where('to_user', Auth::user()->id)
                                        ->where('status', true)
                                        ->get();

                                $count = App\Notification::where('to_user', Auth::user()->id)
                                        ->where('status', true)
                                        ->count();
                            ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                                    @if ($count > 0)
                                    <span class="badge" style="background:red; position:relative; top:-15px; left:-15px">
                                        {{ $count }}
                                    </span>
                                    @endif
                                </a>

                                <ul class="dropdown-menu" style="min-width:350px">
                                    @foreach ($notis as $noti)
                                        <li><a href="{{ route('notifications', $noti->id) }}">{!! $noti->note !!}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <img src="{{url('/img/' . Auth::user()->pic) }}" width="30px" height="30px" class="img-circle"/>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('profile', Auth::user()->slug) }}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('editProfile') }}">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
