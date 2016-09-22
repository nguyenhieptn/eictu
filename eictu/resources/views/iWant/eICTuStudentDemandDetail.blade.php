@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if($want)
	    <div class="col-xs-12">
	      <h2>{{$want->content}}</h2>
	      <h3>Thông tin người đăng : </h3>
	      <p>Họ và tên: <a href="" title="">{{$student->name}}</a></p>
	      <p>Giới tính: 
	      @if($student->gender ==0)
	      	Nữ
	      @else
	      	Nam
	      @endif	
	      </p>
	      <p>Địa chỉ: {{$address->address}}</p>
	      <hr>
	    </div> 
	@endif    
  </div>
</div>
@endsection