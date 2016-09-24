@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if($want)
	    <div class="col-xs-12">
	    <p>Nội dung lời kêu gọi :</p>
	      <h2>{{$want->content}}</h2>
	      <hr>
	      <h3>Thông tin người đăng : </h3>
	      <p>Họ và tên: <b style="color: #e74c3c; font-size: 20px;">{{$student->name}}</b></p>
	      <p>Giới tính: 
	      @if($student->gender ==0)
	      	Nam
	      @else
	      	Nữ
	      @endif	
	      </p>
	    
	      	</p>
	      
	      <hr>
	      <a href="{{route('iwant.search')}}" title="ĐÓng" class="btn btn-danger" style="color: white;">Đóng</a>
	    </div> 
	@endif    
  </div>
</div>
@endsection