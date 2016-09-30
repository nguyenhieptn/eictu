@extends('layouts.student_app')
@section('title')
Chi tiết lời yêu cầu
@endsection
@section('content')
<div class="container">
    <div class="row">
    <style type="text/css" media="screen">
              .boot{

                margin-top:10px; 
                padding-top: 10px;
                padding-bottom: 10px;
                background: #ecf0f1;

                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }
              img{
                width: 100px;
                height: 100px;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }
            </style>
    @if($want)
	    <div class="col-lg-8  col-xs-12">
	    <div class="row boot">
	    	<div class="col-lg-2">
	    		<?php 
	    			$students = DB::table('students')->select('name','avatar')->where('id', $want->student_id)->first();
	    		 ?>
	    		 <img src="$students->avatar" class="img-rounded" height="100px" width="100px" alt="">
	    	</div>
	    	<div class="col-lg-10">
	    		<p><b style="color: #e74c3c; font-size: 20px;">{{$student->name}}</b></p>
			      <p style="color: #7f8c8d; font-size: 20px">
			      @if($student->gender ==0)
			      	Nữ
			      @else
			      	Nam
			      @endif
			      	,
			      	{{$want->location}}

	      <p style="font-size: 15px;">{{$want->content}}</p>
	    	</div>
	    </div>

	      
	      <hr>
	      <a href="{{route('iwant.status')}}" title="ĐÓng" class="btn btn-danger" style="color: white;">Đóng</a>
	      <a href="" title="Nhắn tin cho người đăng tin" class="btn btn-primary" style="color: white; margin-left: 470px; ">Nhắn tin cho người đăng tin</a>
	    </div> 
	@endif    
  </div>
</div>
@endsection
