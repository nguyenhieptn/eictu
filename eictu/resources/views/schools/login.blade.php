
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
    <h1></h1>
    <div class="pagewrapper">
        <div style="width:1280px; height:40px; font-weight:bold; background:#006666; color:#FFFFFF; font-size:25px;">
           eICTuSchoolAdminLogin - Quản Trị Viên
        </div>
        <div class="content1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('schools/login') }}">
            {{ csrf_field() }}

            <!-- <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" required autofocus>

                                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>
-->
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Tài Khoản</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" placeholder="Tài Khoản"  name="username" value="{{old('username')}}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Mật Khẩu</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" placeholder="Mật Khẩu"   name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-6">
                        @if(session()->has('global'))
                            <div class="alert alert-info" style="color: red;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Thông báo! </strong> {{session()->get('global')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Đăng Nhập
                        </button>
                    </div>
                </div>
            </form>
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
