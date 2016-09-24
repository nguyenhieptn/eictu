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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    @yield('css')
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
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('schools') }}"> Schools</a></li>
                <li><a href="{{ url('classes') }}"> Classes</a></li>
                <li><a href="{{ url('student') }}"> Student </a></li>
                <li><a href="{!! route('teacher.login') !!}"> Teacher </a></li>
                <li><a href="{{ url('major') }}"> Major </a></li>
                <li><a href="{{ url('dormitory') }}">Dormitory</a></li>
                <li><a href="{{ url('rentHouse') }}">Rent House</a></li>
                <li><a href="{{ url('iHave') }}">I Have</a></li>
                <li><a href="{{ url('findjob/index') }}">Find Job</a></li>
                <li><a href="{{route('iwant.search')}}">I Want</a></li>
                <li><a href="{{url('iHave')}}">I Have</a></li>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
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
        </div>
    </div>
</nav>

@yield('content')
<<<<<<< HEAD
<script src="{{ url("/js/app.js") }}"></script>
=======
<<<<<<< HEAD
        <!-- Scripts -->
>>>>>>> 515f95f6be17d299ec5186e02e8e45f46e7ccd0b

<script src="{{ url("/js/app.js") }}"></script>
        <!-- Scripts --><script src="{{ url("/js/app.js") }}"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

<script src="{{ url("js/app.js") }}"></script>
<<<<<<< HEAD
<script src="{{ url("/js/app.js") }}"></script>
=======
=======
<script src="{{ url("/js/app.js") }}"></script>
<!-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
>>>>>>> 8a38e72e348c3897734733d6ec31363ce17a7e61
>>>>>>> 515f95f6be17d299ec5186e02e8e45f46e7ccd0b
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</body>
</html>
