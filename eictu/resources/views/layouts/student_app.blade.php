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
    <link href="{{url("/css/layout-2.css")}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
    <style type="text/css" media="screen">
          /*img{width: }*/
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
                        <li><a href="{{url('findjob/total')}}">Quản lý Bài Đăng tìm việc</a></li>
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

    <div class="container" style="margin-top:80px">
    @if(Auth::check())
        <div class="col-md-3 col-sm-3">
            <div style="background-color: #ededed;">        
                   <div>
                         <?php
                    $data1 = \App\Student::select('*')
                            ->where('code', '=', Auth::user()->username)
                            ->get()->first();
                    $classid = $data1 == null ? 0 : $data1->class_id;
                    $avatar = $data1!= null ? $data1->avatar==null ? "/img/avatar.jpg" : $data1->avatar."" : "/img/avatar.jpg";
                    ?>
                    <div style="height:80px;line-height:80px; padding-left:10px">
                        <img alt="Avata" class="img-thumbnail" src="{{ url($avatar)}}" width="50" height="50" class="img-rounded"  />
                        <span><strong>{{$data1->name}}</strong></span>
                    </div>
                </div>
                <div>
                <?php  
                    $url= $_SERVER['REQUEST_URI']; 
                    $arr=array();
                    $arr = explode('/',$url);
                ?>
                    <ul class="list-group">
                      <li class="list-group-item <?php if($arr[1]=='student' && $arr[2]=='newsfeed') echo "list-group-item-warning";?> " ><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> 
                      <a href="{{url('student/newsfeed')}}">News Feed</a></li>
                      @if(count($classid)>0 && $classid !=null)
                            <li class="list-group-item <?php if($arr[1]=='classes' && $arr[2]=='classmatersbirthday') echo "list-group-item-warning";?>">
                                    <a href="{{route('classes.classmatersbirthday', $classid )}}">Sinh nhật bạn cùng lớp</a>
                            </li>
                        @endif
                      <li class="list-group-item <?php if($arr[1]=='iwant') echo "list-group-item-warning";?> "><a href="{{route('iwant.status')}}">Tôi muốn- I Want</a> </li> 
                      <li class="list-group-item <?php if($arr[1]=='iHave') echo "list-group-item-warning";?> "><a href="{{url('/iHave')}}">Chợ đồ cũ</a></li> 
                      <li class="list-group-item <?php if($arr[1]=='findjob') echo "list-group-item-warning";?> "><a href="{{url('/findjob/index')}}">Tìm việc làm </a></li> 
                      <li class="list-group-item <?php if($arr[1]=='dormitory') echo "list-group-item-warning";?> "><a href="{!! url('dormitory/search')!!}">Kí túc xá</a></li> 
                      <li class="list-group-item <?php if($arr[1]=='rentHouse') echo "list-group-item-warning";?> "><a href="{{url('/rentHouse')}}" >Nhà trọ sinh viên</a></li> 
                      <li class="list-group-item <?php if($arr[1]=='chat' && $arr[2]=='classrooms') echo "list-group-item-warning";?> "><a href="{{url('chat/classrooms')}}">Messages / CHAT</a></li>
                      <li class="list-group-item <?php if($arr[1]=='LMS') echo "list-group-item-warning";?> "><a href="{{url('LMS/show')}}">Tiến độ học tập LMS</a></li>                      
                      <li class="list-group-item <?php if($arr[1]=='student' && $arr[2]=='profile') echo "list-group-item-warningr";?> "><a href="{{url("student/profile")}}">Hồ sơ sinh viên</a>
                      </li> 
                    </ul>
                </div>
            </div>
        </div>
        
         <div class="col-md-9 col-sm-9">
            @yield('content')
        </div>
        @else
            <div class="col-md-3 col-sm-3"  style="margin-top:-20px;padding:5px" >
                <div style="background-color: #ededed;" id="Left">        
                    <table style="text-align:left" >
                    <tr>
                        <td>Nếu Bạn là giáo viên,hãy chọn</td>
                    </tr>

                    <tr>
                        <td>
                            <img class="image" src="{{url('quanlytruong/images/giaovien.ico')}}">
                            <a class="link" href="{{route('teacher.login')}}">Giáo Viên</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nếu Bạn là Sinh Viên,hãy chọn</td>
                    </tr>
                    <tr>
                        <td>
                            <img class="image" src="{{url('quanlytruong/images/sinhvien.ico')}}">
                            <a class="link" href="{{url('student/login')}}">Sinh Viên</a>

                        </td>
                    </tr>
                    <tr>
                        <td>Nếu Bạn là quản trị viên của trường học đã tham gia eictu,hãy chọn</td>
                    </tr>
                    <tr>
                        <td>
                            <img class="image" src="{{url('quanlytruong/images/go-home-128.png')}}">
                            <a class="link" href="{{url('schools/login')}}">Trường Học</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nếu trường đại học của bản chưa tham gia eictu, hãy bắt đầu </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="image" src="{{url('quanlytruong/images/register.png')}}">
                            <a class="link" href="{{url('/schools/eICTuSchoolRegister')}}">Đăng Kí</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nếu bạn cần tuyển sinh viên ngoài giờ hãy chọn </td>
                    </tr>
                    <tr>
                        <td>
                            <img class="image" src="{{url('quanlytruong/images/job.png')}}">
                            <a class="link" href="{{url('findjob/index')}}">Sinh Viên Tìm Việc</a>
                        </td>
                    </tr>
                </table>
                </div>
            </div>
              <div class="col-md-9 col-sm-9">
                @yield('content')
            </div>
        @endif
       
    </div>

<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>


    @yield('script')
</body>
</html>
