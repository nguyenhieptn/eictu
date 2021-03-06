@extends('layouts.student_app')
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">
		
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>

@section('title')	
		Trang sinh viên - Sinh nhật bạn cùng lớp
@endsection	


@section('content')
<div>
    <div class="row">
        <div class="panel panel-default">
			<div class="panel-heading">
						<strong>30 ngày sắp tới sinh nhật của các bạn lớp mình có:</strong>
			</div>
            <div class="panel-body">
				
				<table class="table" >				
			
					@if (count($_classmatersbirthday) <1 || $_classmatersbirthday=="")
						<tr >
							<th>
								Không có bạn nào sẽ sinh nhật trong 30 ngày tới.
							</th>
						</tr>
					@else
						<thead>
						    <tr>
							<th>STT</th>
							<th>Họ tên</th>
							<th>Giới tính</th>
							<th>Ngày sinh</th>
							<th>Thời gian</th>
						    </tr>
						</thead>
						@foreach ($_classmatersbirthday as $sv)						
						<tbody>
							<tr >
								<td>{{ $loop->iteration }}</td>
								<td>{{ $sv['name'] }}</td>								
								<td>{{ $sv['gender_text'] }}</td>
								<td>{{ $sv['birthday'] }}</td>
								<td>{{ $sv['deadline'] }}</th>
							</tr>
						</tbody>
						@endforeach
					@endif				
				
				</table>	

			</div>
		</div>
	</div>
</div>
@endsection			


  
