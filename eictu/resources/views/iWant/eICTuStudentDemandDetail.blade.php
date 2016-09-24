@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if($want)
	    <div class="col-lg-8 col-lg-offset-2 col-xs-12">
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
	     
	      <p>Địa chỉ:  
	      		<?php 

	      		if (isset($address)) {
	      			echo " Xóm trọ ông/bà :".$address->hostess." , ".$address->address;
	      		}elseif (isset($address2)) {
	      			echo  "Phòng số :".$address2->room." , Tòa nhà :".$address2->building." , Khu :".$area->name;
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
	      	</p>
	      
	      <hr>
	      <a href="{{route('iwant.search')}}" title="ĐÓng" class="btn btn-danger" style="color: white;">Đóng</a>
	    </div> 
	@endif    
  </div>
</div>
@endsection