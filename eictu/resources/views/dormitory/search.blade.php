@extends('teacher.master')


@section('title')
eICTuStudentDormitorySearch - Tra cứu chỗ ở trong KTX
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('dr/css/font-awesome.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('dr/css/main.css')!!}">

@endsection
@section('content')
<div id="updateStudent">
	<div class="container">
		
		<div class="row">
			@if(Session::has('msg'))
			<div class="alert alert-warning">{!! Session::get('msg') !!}</div>
			@endif
			<div class="col-sm-12">
				<a href="{!! url('dormitory/update') !!}"><h3 class="redirect"><i class="fa fa-link"></i> Sinh viên cập nhật nơi ở trong KTX</h3></a>
			</div>
		</div>
		<div class="contentUpdate">
			<h3>Tìm kiếm thông tin nơi ở sinh viên trong KTX bằng mã sinh viên</h3>
			<div class="box">
				<form action="{!! url('dormitory/query')!!}" method="get" id="fSearch" class="form-horizontal" accept-charset="utf-8">
					<div class="form-group">
						<label class="col-sm-3 control-label"><i class="fa fa-circle-o"></i> Mã số sinh viên:</label>
						<div class="col-sm-4">
							<input type="text" name="student_id" value="" class="form-control" placeholder="DTC...">
						</div>
						<div class="col-sm-2">
							<button type="sumit" class="btn btn">Tìm kiếm</button>
						</div>
					</div>
				</form>

				<div id="result">
					<h3>Kết quả tìm kiếm:</h3>
					@if(isset($dormitory))
						<div class="list">
							<h3>
								<i class="fa fa-caret-right"></i>
								<span class="date_on">{!! $dormitory->start_on!!}</span>{!! $student->name !!} Phòng {!! $dormitory->room!!}, nhà
								 {!! $dormitory->building!!}, {{ $area->name }}, KTX {!! $school->name !!}
							</h3>
						</div>
					@endif
					@if(isset($none))
						<h4 class="none">{!! $none !!}</h4>
					@endif
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
