@extends('teacher.master')
@section('title')
eICTuStudentDormitoryHistory - Lịch sử chỗ ở trong KTX
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{!! url('dr/css/font-awesome.min.css')!!}">
<link rel="stylesheet" type="text/css" href="{!! url('dr/css/main.css')!!}">

@endsection
@section('content')
<div id="history" style="padding-left: 15px;">
	<div class="page-header">
		@if(!Auth::guest())
		@if(Auth::user()->type == 3)
		<a href="{!! url('dormitory/update')!!}" style="border: 2px solid #d1d1d1; padding: 10px; border-radius: 4px; background: #e65c00; color: #fff;"><strong><i class="fa fa-plus"></i> Cập nhật chỗ ở mới trong KTX</strong></a>
		@endif
		@endif
	</div>
	<div class="col-sm-12">
		@if(isset($cache) && $cache !="")
		 <ul>
		 	<?php echo $cache; ?>
		 </ul>
		@endif
	</div>
</div>
@endsection
