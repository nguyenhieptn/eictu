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
	
	Danh sách sinh viên trong lớp {{ $_class->name }} 
	
@endsection		

@section('content')
<div class="container">
<div class="qllophoc_header">
	<header id="header" class="">
		<div class="header-content">
			<span class="title">eICTUclassstudentList - Sinh viên trong lớp học
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
		  <td>eICTUclassstudentList - Sinh viên trong lớp học</td>
		  <td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" />Logout</td>
		</tr>
	</table>
	-->
</div>
<div class="qllophoc_content">
	<div>
		<span style="display:inline;border:0px solid red;margin:0; padding:0px 0px;">
			<img src="{!! url('classes_src/images/li.png')!!}" />
		</span>
		<!-- Bat popup
	   <span style="display:inline;border:0px solid red;margin:0; padding:0px 0px">
				<a href="{{ route('classes.studentjoinclass', $_class->id)}}" style=" text-decoration:none"target="popup" onclick="PopupCenter('{{ route('classes.studentjoinclass', $_class->id)}}', 'THÊM SINH VIÊN VÀO LỚP')" >	   
					THÊM SINH VIÊN VÀO LỚP
				</a
	   </span>
	   -->
	   <span style="display:inline;border:0px solid red;margin:0; padding:0px 0px">
				<a href="{{ route('classes.studentjoinclass',$_class->id)}}" >	   
					THÊM SINH VIÊN VÀO LỚP
				</a>
	   </span>
	</div>

	<div class="dssv">
	   <table class="table" >				
			<tr>
				<td align="left" class="col-md-1" colspan="12" >
					Danh sách sinh viên lớp {{ $_class->name }}
				</td>
			</tr>
			@if (count($_students) === 0 )
			<tr>
				<td align="left" class="col-md-1" colspan="12" >
					Chưa có sinh viên
				</td>
			</tr>
			@else
				@foreach ($_students as $_student)						
					<tr>
						<th >
							@if(isset($_page) && count($_page>0))							
								{{ $loop->iteration + $_page }}.
							@else								
								{{ $loop->iteration }}.
							@endif
						</th>
						<th class="col-md-1" >
							{{ $_student->code }}
						</th>
						<th class="col-md-10" colspan="10">
							{{ $_student->name }}
						</th>							
					</tr>
				@endforeach
			@endif						
		</table>
		@if (count($_students) >0 )
			{{ $_students->links() }}
		@endif
    </div>
</div>
</div>
@endsection			

