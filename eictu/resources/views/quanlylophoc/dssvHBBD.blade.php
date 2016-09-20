@extends('quanlylophoc.main')
@section('title')
	
		Sinh nhật bạn cùng lớp 
	
@endsection		


@section('content')


<div class="qllophoc_header">
<table class="table_header" >
<tr>
  <td >eICTuClassmatersBirthday - Sinh nhật bạn cùng lớp</td>
  <td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" />Logout</td>
</tr></table>
</div>
<div class="qllophoc_content">
	
	<div class="dssv">
	   <table class="table" >
				
					<tr><td align="left" class="col-md-1" colspan="12" >30 ngày sắp tới sinh nhật của các bạn lớp mình có:</td></tr>
					@if (count($sinhviens) === 0)
					I have no record!
					@else
						@foreach ($sinhviens as $sv)						
							<tr >
								<th>{{ $loop->iteration }}.</th>
								<th>{{ $sv->hoten }}</th>								
								<th>Nam</th>
								<th>{{ $sv->ngaysinh }}</th>
								<th class="col-md-8" colspan="8">X ngày nữa</th>
							</tr>
						@endforeach
					@endif	
			
				
		</table>
		{{ $sinhviens->links() }}

   </div>
</div>
@endsection			


  