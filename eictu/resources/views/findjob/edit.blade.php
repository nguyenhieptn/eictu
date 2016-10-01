@extends('layouts.student_app')
@section('content')
	<div class="panel panel-default find-job">
        <div class="panel-heading">Quản lý Bài đăng tìm việc </div>
        <div class="panel-body">
          	<form method="post" action="{{route('findjob.update',$data['id'])}}">
          	<input type="hidden" name="_token" value="{{csrf_token()}}">
			  <div class="form-group">
			    <label for="email">Nội dung bài đăng:</label>
			   	<textarea class="form-control"  name="content">{{$data['content']}}</textarea>
			   	<span style="color:#E27D73">{{$errors->err->first('content')}}</span>
			  </div>
			  <button type="submit" class="btn btn-primary" style="margin-bottom:5px">Cập nhật</button>
			</form>
        </div>
    </div>
@endsection