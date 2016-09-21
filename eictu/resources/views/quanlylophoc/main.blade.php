<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>Quản Lý Lớp học - @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{!! url('quanlylophoc/css/bootstrap.min.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! url('quanlylophoc/css/quanlylophoc.css')!!}">		
		<script src="{!! url('quanlylophoc/js/jquery.min.js')!!}"></script>
		<script src="{!! url('quanlylophoc/js/quanlylophoc.js')!!}"></script>
		 
	</head>
	<body>		
		<div id="wrapper">
			<div class="container">
				@include('quanlylophoc.blocks.top')
					<section id="content">
						@yield('content')
					</section>
				@include('quanlylophoc.blocks.bottom')
			</div>
		</div>
	</body>
</html>