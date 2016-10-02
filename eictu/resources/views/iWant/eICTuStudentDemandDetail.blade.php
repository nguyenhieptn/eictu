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
                padding: 10px;
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

             <?php 
              function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);
            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;
            $string = array( 'y' => 'năm', 'm' => 'tháng', 'w' => 'tuần', 'd' => 'ngày', 'h' => 'giờ', 'i' => 'phút', 's' => 'giây', );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                } else {
                    unset($string[$k]);
                }
            }
            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
        }
             ?>
    @if($want)
    <?php 
		$students = DB::table('students')->select('name','avatar', 'gender')->where('id', $want->student_id)->first();
	 ?>
	    <div class="col-lg-12  col-xs-12">
	    
		<div class='media boot'>
		   <a href='' class='media-left' href='#'><img class='media-object'  class="img-rounded" src="{{asset($students->avatar)}}" alt=''></a>
		   <div class='media-body'> 
		     <p class="pull-right date-post">
		       {!! time_elapsed_string($want->created_at) !!}
		   </p>
		   <h4 class='media-heading'><strong>{!! $students->name !!}</strong></h4>
		   <p>{{ $want->location }}</p>, 
		   @if($student->gender == 1)
		   Nam
		   @else
		   Nữ
		   @endif
		   <a href="" title=""><p class="index-content">{{$want->content}}</p></a></div>
		</div>

	      
	      <hr>
	      <a href="{{route('iwant.status')}}" title="ĐÓng" class="btn btn-danger" style="color: white;">Đóng</a>
	      <a href="/chat/friendroom?id={{auth()->user()->username}}&friend={{$student->code}}" title="Nhắn tin cho người đăng tin" class="btn btn-primary" style="color: white; margin-left: 470px; ">Nhắn tin cho người đăng tin</a>
	    </div> 
	@endif    
  </div>
</div>
@endsection
