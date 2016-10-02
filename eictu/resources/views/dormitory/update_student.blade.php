@extends('layouts.student_app')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('dr/css/main.css')!!}">

@endsection
@section('title')
eICTuStudentDormitoryUpdate - Sinh viên cập nhật chỗ ở KTX
@endsection
@section('content')
<div id="updateStudentDr">
		<div class="contentUpdate">
			<div class="page-header">
				<h3>Cập nhật thông tin về chỗ ở hiện tại của KTX tại đây</h3>
			</div>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			@if(Session::has('msg'))
				<div class="alert alert-success">{!! Session::get('msg') !!}</div>
			@endif
			<div class="box">
				<form action="{!! url('dormitory/update')!!}" method="post" id="fUpdate" class="form-horizontal" accept-charset="utf-8">
				{!! csrf_field()!!}
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label"><i class="fa fa-circle-o"></i> Khu ký túc xá:</label>
						<div class="col-sm-4">
							<input type="text" name="info" value="{!! old('info', isset($str)? $str: '') !!}" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label"><i class="fa fa-circle-o"></i> Ngày bắt đầu ở:</label>
						<div class="col-sm-4">
							<input type="text" name="start_on" value="{!! old('start_on', isset($date) ? $date : '')!!}" class="form-control" placeholder="dd/mm/yyyy">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-4">
							<button type="sumit" class="btn btn">Cập nhật</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-10 col-sm-offset-1">
				<h3><strong>Lịch sử chuyển chỗ ở trong KTX của bạn</strong></h3>
			<?php 
				$code = Auth::user()->username;
	        	$student = DB::table('students')->where('code', $code)->first();
        	?>
				<ul>
					{!! Cache::get($student->id)!!}
				</ul>
			</div>
		</div>
</div>

@endsection
