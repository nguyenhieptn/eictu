@extends('layouts.student_app')
@section('title')
Chi tiết lời yêu cầu
@endsection
@section('content')
<div >
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
            </style>

            <?php 
            	function time_elapsed_string($datetime, $full = false) {
				    $now = new DateTime;
				    $ago = new DateTime($datetime);
				    $diff = $now->diff($ago);

				    $diff->w = floor($diff->d / 7);
				    $diff->d -= $diff->w * 7;

				    $string = array(
				        'y' => 'year',
				        'm' => 'month',
				        'w' => 'week',
				        'd' => 'day',
				        'h' => 'hour',
				        'i' => 'minute',
				        's' => 'second',
				    );
				    foreach ($string as $k => &$v) {
				        if ($diff->$k) {
				            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
				        } else {
				            unset($string[$k]);
				        }
				    }

				    if (!$full) $string = array_slice($string, 0, 1);
				    return $string ? implode(', ', $string) . ' ago' : 'just now';
				}
             ?>
    @if($want)
	    <div class="col-lg-12  col-xs-12">
	    <div class="row boot">
	    	<div class="col-lg-2">
	    		<?php 
	    			$students = DB::table('students')->select('name','avatar')->where('id', $want->student_id)->first();
	    		 ?>
	    		 <img src="{{asset($students->avatar)}}" class="img-rounded" height="100px" width="100px" alt="">
	    	</div>
	    	<div class="col-lg-10">
	    		<p><b style="color: #e74c3c; font-size: 20px;">{{$student->name}}</b><span style="margin-left: 200px;">{!! time_elapsed_string($want->created_at) !!}</span></p>
			      <p style="color: #7f8c8d; font-size: 20px">
			      @if($student->gender ==0)
			      	Nữ
			      @else
			      	Nam
			      @endif
			      	,
			      	<?php 
			      		if (empty($want->location)) {
			      			if (isset($address)) {
				      			echo " Xóm trọ ông/bà :".$address->hostess." , ".$address->address;
				      		}elseif (isset($address2)) {
				      			echo  "Phòng số :".$address2->room." , Tòa nhà :".$address2->building." , Khu :".$area->name;
				      		}else{
				      			echo "Không xác định được địa chỉ hiện tại của sinh viên";
				      		}
			      		}else{
			      			echo $want->location;
			      		}
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
