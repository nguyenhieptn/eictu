<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{!! url('qlktx/css/bootstrap.min.css')!!}">
	<link rel="stylesheet" href="{!! url('qlktx/css/font-awesome.min.css')!!}">
	<link rel="stylesheet" href="{!! url('qlktx/css/main.css')!!}">
</head>
<body>
	<div id="wrapper">
		<div class="container">
			@include('qlktx.blocks.header')
			<section id="content">
				@yield('content')
			</section>
			@include('qlktx.blocks.footer')
		</div>
	</div>
</body>
</html>