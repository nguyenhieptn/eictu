@extends('layouts.app')		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">
		
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>
<
@section('title')	
		Trang sinh viên - Sinh nhật bạn cùng lớp 	
@endsection	


@section('content')
<div class="container">
<div class="qllophoc_header">
<!--
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
	-->
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
<strong>30 ngày sắp tới sinh nhật của các bạn lớp mình có:</strong>
	<div class="dssv">
	
	   <table class="table" >				
			
			@if (count($_classmatersbirthday) <1 || $_classmatersbirthday=="")
				<tr >
					<th class="col-md-1" colspan="12">
						Không có bạn nào sẽ sinh nhật trong 30 ngày tới.
					</th>
				</tr>
			@else
				@foreach ($_classmatersbirthday as $sv)						
					<tr >
						<td>{{ $loop->iteration }}.</td>
						<td>{{ $sv['name'] }}</td>								
						<td>{{ $sv['gender_text'] }}</td>
						<td>{{ $sv['birthday'] }}</td>
						<td class="col-md-8" colspan="8">{{ $sv['deadline'] }}</th>
					</tr>
				@endforeach
			@endif				
				
		</table>	

   </div>
</div>
</div>
@endsection			


  
