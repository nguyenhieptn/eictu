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
	    			$students = DB::table('students')->select('name','avata')->where('id', $want->student_id)->first();
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
			      	<?php 

	      		if (isset($address)) {
	      			echo " Xóm trọ ông/bà :".$address->hostess." , ".$address->address;
	      		}elseif (isset($address2)) {
	      			echo  "Phòng số :".$address2->room." , Tòa nhà :".$address2->building." , Khu : 1";
	      		}else{
	      			echo "Không xác định được địa chỉ hiện tại của sinh viên";
	      		}
	      		
	      		// if (isset($address) || isset($address2)) {
	      		// 	if (strtotime($address->date_join) > strtotime($address2->start_on)) {
	        //     	echo " Xóm trọ ông/bà :".$address->hostess." , ".$address->address;
		       //    }else{
		       //    	$area = DB::table('areas')->where('id', $address2->area_id)->first();
		       //    	echo  "Phòng số :".$address2->room." , Tòa nhà :".$address2->building." , Khu :".$area->name;
		       //    }
	      			
	      		
	      ?>

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
