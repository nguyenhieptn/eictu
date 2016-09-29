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
<div class="wrapper">
    <div class="pagewrapper">
        <div style="position: fixed;">
            <div class="top">
                <span>Trang chủ của sinh viên</span>
            </div>
        </div>
        <div style="text-align: center">
            <div class="content1">
                    <div class="col-md-3">
                        <div style="position: fixed; margin-top: 70px; margin-bottom: 30px;margin-left: 20px;">
                            <img src="{{ url($avatar)}}" width="50" height="50" />
                            <span >{{$name}}</span>
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
                    <div class="col-md-9" style="margin-top: 70px;">
                        <h1>This is my conten pages1</h1>
                        <h1>This is my conten pages2</h1>
                        <h1>This is my conten pages3</h1>
                        <h1>This is my conten pages4</h1>
                        <h1>This is my conten pages5</h1>
                        <h1>This is my conten pages6</h1>
                        <h1>This is my conten pages7</h1>
                        <h1>This is my conten pages8</h1>
                        <h1>This is my conten pages9</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                        <h1>This is my conten pages</h1>
                    </div>
            </div>
        </div>
    </div>
</div>
@yield('content')
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstit rap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
