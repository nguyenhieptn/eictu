@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/bootstrap.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/font-awesome.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('public/dormitory/css/main.css')!!}">

@endsection
@section('content')
<div id="updateStudent">
	<div class="container">
		<div class="top">
			<div class="inner-top">
				<p class="caption">eICTuStudentDormitoryUpdate - Sinh viên cập nhật chỗ ở KTX</p>
			</div>
		</div>
		<div class="contentUpdate">
			<h3>Cập nhật thông tin về chỗ ở hiện tại của KTX tại đây</h3>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div class="box">
				<form action="{!! url('dormitory/update')!!}" method="post" id="fUpdate" class="form-horizontal" accept-charset="utf-8">
				{!! csrf_field()!!}
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label"><i class="fa fa-circle-o"></i> Khu ký túc xá:</label>
						<div class="col-sm-4">
							<input type="text" name="info" value="{!! old('info') !!}" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 col-sm-offset-1 control-label"><i class="fa fa-circle-o"></i> Ngày bắt đầu ở:</label>
						<div class="col-sm-4">
							<input type="text" name="start_on" value="" class="form-control" placeholder="dd/mm/yyyy">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2 col-sm-offset-4">
							<button type="sumit" class="btn btn">Cập nhật</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{!! url('public/dormitory/js/jquery-1.12.4.min.js')!!}"></script>
	<script type="text/javascript" src="{!! url('public/dormitory/js/bootstrap.min.js')!!}"></script>
</div>
@endsection