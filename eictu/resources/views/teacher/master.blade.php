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

                margin-top:10px; 
                padding-top: 5px;
                padding-bottom: 5px;
                background: #ecf0f1;

                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }
          /*    img{
                width: 100px;
                height: 100px;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }*/
            </style>
    <style type="text/css" media="screen">
        /*.pagination ul li{
            padding: 3px 10px;
            margin: 3px;
            font-size: 20px;
            background: #bdc3c7;
        }*/
        #Left  table{
            margin: 20px;
        }

        #Left table img{
            width: 30px;
            height: auto;
            float: left;
            margin-left: 50px;
        }
        #Left table #topimg {
            width: 50px;
            float: left;
            margin-bottom: 20px;
        }
        #Left table td{
            padding: 5px 0;
            font-weight: bold;
        }
        #Left table td a{
            text-decoration: none;
            color: black;
        }
        #Left table td a:hover{
            color:#FF2C21 ;
        }
        #Left table td a:checked{
            color:#FF2C21 ;
        }
        #Left table td span {
            color: #BFCDE3;
            font-weight: bold;
        }
        #toptext{
            font-weight: bold;
            font-size: 20px;
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

<div class="container" style="margin-top: 100px;">
    <div class="col-md-3" id="Left">
        <div style="background-color: #ededed; position: fixed; height: 450px;">
            <table style="text-align: left">
                <tr>
                    <td>
                    <?php 
                    if (isset(Auth::user()->id)) {
                       $avatar = DB::table('teacher')->where('code',Auth::user()->username )->first();
                    }
                     ?>
                        <a href="{{route('teacher.avatar')}}" title=""><img src="{!!asset('/upload/avatar/'.$avatar->avatar)!!}" width="60px" height="60px" /></a>
                      
                        <a href="" style="text-transform:uppercase;">
                            @if(Auth::user()->id)
                                {{Auth::user()->name}}
                            @endif
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="link" href="{{ route('teacher.index') }}"><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span>New Feed</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="link" href="{{route('dormitory.getSearch')}}"><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span>Ký túc xá</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="link" href="{{url('rentHouse')}}"><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span>Nhà trọ sinh viên</a>

                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="link" href="{{url('/iHave')}}"><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span>Chợ đồ cũ</a>
                    </td>
                </tr>

                <tr>
                    <td>
                        <a class="link" href="{{url('/chat/classlist')}}"><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span>Message/CHAT</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="col-md-9" >
        @yield('content')
    </div>
</div>
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
