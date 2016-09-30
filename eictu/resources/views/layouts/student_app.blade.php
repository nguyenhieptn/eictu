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
        #Left  table{
            margin: 20px;
        }

        #Left table img{
            width: 30px;
            height: auto;
            float: right;
            margin-right: 20px;
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
            <div style="background-color: #ededed; position: fixed; height: 1000px;">
                <?php
                $data1 = \App\Student::select('*')
                        ->where('code', '=', Auth::user()->username)
                        ->get()->first();
                $classid = $data1 == null ? 0 : $data1->class_id;
                $avatar = $data1!= null ? $data1->avatar==null ? "/img/avatar.jpg" : $data1->avatar."" : "/img/avatar.jpg";

                ?>
                <div style="margin-top: 30px; margin-bottom: 30px;margin-left: 20px;">
                    <img src="{{ url($avatar)}}" width="50" height="50" />
                    <span >{{$data1->name}}</span>
                </div>
                <table style="text-align: left">

                    @if(count($classid)>0 && $classid !=null)
                        <tr>
                            <td><img src="{{url('img/Gift-128.png')}}"/></td>
                            <td>
                                <a href="{{route('classes.classmatersbirthday', $classid )}}">Sinh nhật bạn cùng lớp</a>
                            </td>
                        </tr>
                    @endif

                    <tr>
                            <td><img src="{{url('img/newfeed.png')}}"/></td>
                            <td><a href="{{url('student/newsfeed')}}">News Feed</a></td>
                        </tr>
                    <tr>
                        <td><img src="{{url('img/Information.png')}}"/></td>
                        <td><a href="{{route('iwant.status')}}">Tôi muốn <span>- I Want </span></a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/i_information_more_find_out_info-128.png')}}"/></td>
                        <td><a href="{{url('/iHave')}}">Chợ đồ cũ</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/Candidate_Search-128.png')}}"/></td>
                        <td><a href="{{url('findjob/index')}}">Tìm việc làm </a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/go-home-128.png')}}"/></td>
                        <td><a href="{!! url('dormitory/search')!!}">Kí túc xá</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/go-home.png')}}"/></td>
                        <td><a href="{{url('/rentHouse')}}">Nhà trọ sinh viên</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/Chat-2-128.png')}}"/></td>
                        <td><a href="{{url('chat/classrooms')}}">Messages / CHAT</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/chat-128.png')}}"/></td>
                        <td><a href="{{url('chat/friend')}}">Chát với bạn</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/search.png')}}"/></td>
                        <td><a href="{{url('LMS/show')}}">Tiến độ học tập LMS</a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/frmPhanQuyen.png')}}"/></td>
                        <td><a href="#">Hồ sơ</a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-9" style="margin-top: 70px;">
            @yield('content')
        </div>
    </div>
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
