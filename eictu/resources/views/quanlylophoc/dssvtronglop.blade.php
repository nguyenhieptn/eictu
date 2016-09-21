@extends('quanlylophoc.main')
@section('title')
	@if ($lop)
		Danh sách sinh viên trong lớp {{ $lop->tenlop }} 
	@endif
@endsection		


@section('content')

<div class="qllophoc_header">
	<header id="header" class="">
		<div class="header-content">
			<span class="title">eICTUclassstudentList - Sinh viên trong lớp học</span>
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
			<img src="{!! url('quanlylophoc/images/li.png')!!}" />
		</span>
	   <span style="display:inline;border:0px solid red;margin:0; padding:0px 0px">
				<a href="{{ URL::to('qllh/phanlop/') }}/{{ $lop->lopid }}" style=" text-decoration:none"target="popup" onclick="PopupCenter('{{ URL::to('qllh/phanlop/') }}/{{ $lop->lopid }}', 'THÊM SINH VIÊN VÀO LỚP')" >	   
					THÊM SINH VIÊN VÀO LỚP
				</a
	   </span>
	</div>

	<div class="dssv">
	   <table class="table" >				
			<tr>
				<td align="left" class="col-md-1" colspan="12" >
					Danh sách sinh viên lớp {{ $lop->tenlop }}
				</td>
			</tr>
			@if (count($sinhviens) === 0)
			<tr>
				<td align="left" class="col-md-1" colspan="12" >
					Chưa có sinh viên
				</td>
			</tr>
			@else
				@foreach ($sinhviens as $sv)						
					<tr>
						<th >
							{{ $loop->iteration }}.
						</th>
						<th class="col-md-1" >
							{{ $sv->masv }}
						</th>
						<th class="col-md-10" colspan="10">
							{{ $sv->hoten }}
						</th>							
					</tr>
				@endforeach
			@endif						
		</table>
		{{ $sinhviens->links() }}
   </div>
</div>
@endsection			

