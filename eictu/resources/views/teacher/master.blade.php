@if(Auth::user()->type == 2)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url("/css/app.css")}}" rel="stylesheet">
    <link href="{{url("/css/style.css")}}" rel="stylesheet">
    <link href="{{url("/css/chat.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
    <style type="text/css" media="screen">
        .boot{
            margin-top: 10px;
            padding: 10px;
            border-top-left-radius:4px;
            border-top-right-radius:4px;
            border-bottom-right-radius:4px;
            border-bottom-left-radius:4px;
            background: #ecf0f1;
        }
        .time{
            position: relative;
            margin-left: 240px;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/')!!}" style="font-size: 22px;"><strong>eICTU</strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="">@yield('title')</a></li>

            </ul>
            <ul class="navbar-nav nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" style="font-size:15px">Đăng Nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/dormitory/logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container" style="margin-top:56px">
    <div class="col-md-3 col-sm-3">
        <div style="background-color: #ededed;">
            <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/eICTuHomePage.css')!!}">
            <div>
                <ul class="list-group">
                @if(Auth::user()->id)
                <?php 
                     if (isset(Auth::user()->id)) {
                       $avatar = DB::table('teacher')->where('code',Auth::user()->username )->first();
                    }
                 ?>
                    <li class="list-group-item" style="background:scroll; text-transform: uppercase;"> {{Auth::user()->name}}<br/>  <a href="{{route('teacher.avatar')}}" title=""><img class="image" src="{!!asset($avatar->avatar)!!}"></a>{{$avatar->name}} </li>
                @endif
                   
                    <li class="list-group-item"style="background:scroll;"><br/> <a class="link" href="">News Feed</a></li>
                    <li class="list-group-item"style="background:scroll;"><br/><a class="link" href="{{url('dormitory/search')}}">Ký túc xá</a></li>
                    <li class="list-group-item" style="background:scroll;"><br/><a class="link" href="{{url('rentHouse')}}">Nhà trọ sinh viên</a></li>
                    <li class="list-group-item"style="background:scroll;"><br/>  <a class="link" href="{{url('iHave')}}">Chợ đồ cũ</a></li>
                    <li class="list-group-item"style="background:scroll;"><br/> <a class="link" href="{{url('chat/classrooms')}}">Message/CHAT</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9">
        @yield('content')
    </div>
</div>
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
@endif

@if(Auth::user()->type == 3)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url("/css/app.css")}}" rel="stylesheet">
    <link href="{{url("/css/style.css")}}" rel="stylesheet">
    <link href="{{url("/css/chat.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
    <style type="text/css" media="screen">
        /*.pagination ul li{
            padding: 3px 10px;
            margin: 3px;
            font-size: 20px;
            background: #bdc3c7;
        }*/
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('/')!!}" style="font-size: 22px;"><strong>eICTU</strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="">@yield('title')</a></li>

            </ul>
            <ul class="navbar-nav nav navbar-right">

                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" style="font-size:15px">Đăng Nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/dormitory/logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div style="margin-top: 100px">
    @yield('content')
</div>

<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

@endif

