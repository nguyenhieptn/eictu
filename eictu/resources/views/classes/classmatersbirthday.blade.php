@extends('layouts.app')
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		
		<title>Quản Lý Lớp học - @yield('title')</title>
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">
			
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>
@section('title')	
		Sinh nhật bạn cùng lớp 	
@endsection		

@section('content')
<div class="container">
<div class="qllophoc_header">
	<header id="header" class="">
		<div class="header-content">
				<span class="title">
					eICTuClassmatersBirthday - Sinh nhật bạn cùng lớp
					
					@if(!Auth::guest())
						<span class="pull-right">
							<img src="{!! url('classes_src/images/logout.png')!!}" />
							<a href="{{ route('classes.logout')}}">Logout</a>
						</span>
					@endif
					
					
				</span>
		</div>
	</header>
<!--
	<table class="table_header" >
		<tr>
		  <td >eICTuClassmatersBirthday - Sinh nhật bạn cùng lớp</td>
		  <td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" />Logout</td>
		</tr>
	</table>
-->
</div>
<div class="qllophoc_content">	
	<div class="dssv">
	   <table class="table" >				
			<tr><td align="left" class="col-md-1" colspan="12" >30 ngày sắp tới sinh nhật của các bạn lớp mình có:</td></tr>
			@if (count($_classmatersbirthday) <1 || $_classmatersbirthday=="")
				<tr >
					<th class="col-md-1" colspan="12">
						Không có bạn nào sẽ sinh nhật trong 30 ngày tới.
					</th>
				</tr>
			@else
				@foreach ($_classmatersbirthday as $sv)						
					<tr >
						<th>{{ $loop->iteration }}.</th>
						<th>{{ $sv['name'] }}</th>								
						<th>{{ $sv['gender_text'] }}</th>
						<th>{{ $sv['birthday'] }}</th>
						<th class="col-md-8" colspan="8">{{ $sv['deadline'] }}</th>
					</tr>
				@endforeach
			@endif				
				
		</table>	

   </div>
</div>
</div>
@endsection			


  
