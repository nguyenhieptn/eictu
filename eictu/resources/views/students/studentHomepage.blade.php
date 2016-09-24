
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="{{ url("/css/style.css") }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('css')
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{url("/css/app.css")}}" rel="stylesheet">
    <link href="{{url("/css/style.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css" media="screen">
        .pagination ul li{
            padding: 3px 10px;
            margin: 3px;
            font-size: 20px;
            background: #bdc3c7;
        }
    </style>
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <div class="wrapper">
        <h1>Quản lý sinh viên</h1>
        <div class="pagewrapper">
            <div class="top">
                <span>eICTuStudentLogin - Trang chủ của sinh viên</span>
                <div>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
            <div class="content1">
                <table>
                    <tr>
                        <td ><img src="{{ url('img/radio.png')}}" id="topimg"/></td>
                        <td id="toptext">{{$name}}</td>
                    </tr>

                    @if(count($classid)>0 && $classid !=null)
                        <tr>
                            <td><img src="{{url('img/rightarrow.png')}}"/></td>
                            <td>
                                <a href="{{route('classes.classmatersbirthday', $classid )}}">Sinh nhật bạn cùng lớp</a>
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{route('iwant.search')}}">Tôi muốn <span>- I Want </span></a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('/iHave')}}">Tôi có <span>- I Have </span></a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('findjob/index')}}">Tôi tìm việc <span>- I Am Finding a Part-time Job </span></a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('/searchDorm')}}">Nơi ở của bạn trong kí túc xá</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('/rentHouse')}}">Bạn tôi thuê nhà ở đâu</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('chat/classrooms')}}">Chát với cả lớp</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('chat/friend')}}">Chát với bạn</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="#">Tìm đồ cũ </a></td>
                    </tr>

                    <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="{{url('#')}}">LMS</a></td>
                </tr>
                </table>
            </div>
        </div>
</div>

@yield('content')
<!-- Scripts --><script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script src="{{ url("js/app.js") }}"></script>
<script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
