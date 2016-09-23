<html>
	<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		
		<title>Quản Lý Lớp học - @yield('title')</title>
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">
			
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>
		 
	</head>
	<body>		
		<div id="wrapper">
			<div class="container">				
				<section id="content">
					@yield('content')
				</section>				
			</div>
		</div>
	</body>
</html>