
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
        img{
            width: 50px;
            height: 50px;
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
            <span>eICTuHomePage - Trang chủ</span>
        </div>
        <div class="content1">
            <h2>Đây là hệ sinh thái dành cho các trường đại học</h2>
            <table>
                <tr>
                    <td colspan="2">Nếu là Giáo viên, hãy chọn :</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><img width="50" src="{{url('/img/rightarrow.png')}}"/></td>
                    <td><a href="#">Giáo viên</a></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2"> Nếu là Sinh viên, hãy chọn :</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><img  width="50" src="{{url('/img/rightarrow.png')}}"/></td>
                    <td><a href="{{url('student/login')}}">Sinh viên</a>                    </td>
                    <td> </td>
                </tr>

                <tr>
                    <td colspan="2">Nếu là Quản trị viên của trường học đã tham gia eICTU, hãy chọn :</td>
                    <td> </td>
                </tr>
                <tr>
                    <td><img src="{{url('/img/rightarrow.png')}}"/></td>
                    <td><a href="{{url('/login')}}">Trường học</a></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Nếu là Trường đại học của bạn chưa tham gia eICTU, hãy chọn :</td>
                    <td></td>
                </tr>
                <tr>
                    <td><img src="{{url('/img/rightarrow.png')}}"/></td>
                    <td> <a href="{{url('schools/create')}}">Đăng ký</a>                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">Nếu bạn là người cần tuyển sinh viên làm việc ngoài giờ, hãy chọn :</td>
                    <td></td>
                </tr>
                <tr>
                    <td><img src="{{url('/img/rightarrow.png')}}"/></td>
                    <td><a href="{{url('findjob/index')}}">Sinh viên tìm việc</a>                    </td>
                    <td></td>
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
