@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-xs-3">
    		<p><a href="{{route('teacher.add')}}" title="">Thêm giảng viên vào trường</a></p>
    	</div>
    	<div class="col-xs-3">
    		<p><a href="{{route('teacher.list')}}" title="">Danh sách Giảng Viên</a> </p>
    	</div>
  </div>

  <div class="row">
  	
  </div>
</div>
@endsection