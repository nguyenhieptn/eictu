@extends('quanlylophoc.main')
@section('title')
	Trang phân lớp cho sinh viên
@endsection		
@section('content')
<div class="qllophoc_header">
<table class="table_header" >
<tr>
  <td >eICTUStudentJoinClass - Thêm sinh viên vào lớp học</td>
  <td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" />Logout</td>
</tr></table>
</div>
   <div class="qllophoc_content">
	<div>
	  Danh sách Sinh viên trúng tuyển chưa phân lớp.
	</div>

	<div class="dssv">
		<table class="table" > 
	   
		<tr>
		   <td align="left" class="col-md-1" colspan="12" >
			Nhấn vào tên sinh viên để thêm vào lớp {{ $lop->tenlop }}
		   </td>
		</tr>
		@if (count($sinhviens) === 0)
			I have no record!
		@else
			@foreach ($sinhviens as $sv)						
				<tr>
					<th >{{ $loop->iteration }}.</th>					
					<th >Ma N</th>
					<th >
						<a style="text-decoration:none; color:black" href="{{ URL::to('/qllh/phanlop/') }}/{{ $lop->lopid }}/{{ $sv->masv }}">{{ $sv->hoten }}</a>
					</th>
					<th >Nam</th>
					<th class="col-md-8" colspan="8">{{ $sv->ngaysinh }}</th>
										
				</tr>
			@endforeach
		@endif		
				
		</table>
		{{ $sinhviens->links() }}
		<form method="get" action="{{ URL::to('qllh/dssv/') }}/{{ $lop->lopid }}">
			<center><button type=submit onclick="return refreshAndClose();" >Đóng</button></center>
			<script type="text/javascript">
    function refreshAndClose() {
        window.opener.location.reload(true);
        window.close();
    }
</script>
		</form>
   </div>
</div>
@endsection			
  
   