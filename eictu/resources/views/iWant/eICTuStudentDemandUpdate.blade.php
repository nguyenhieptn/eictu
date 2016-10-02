
@extends('layouts.student_app')
@section('title')
Đăng tin - Danh sách những mong muốn
@endsection
@section('content')
<div class="container">
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
@if(Auth::check() && Auth::user()->type ==3)

        <div class="row">
    <div class="col-lg-8 col-xs-12">
      <form action="{{route('iwant.status')}}" role="form" method="post" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <div class="form-group {{$errors->has('content')? ' has-error': ''}}">
          <textarea placeholder="Gõ bản tin đề nghị giúp đỡ của bạn vào đây…Chúc bạn may mắn!" name="content" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
          <input type="text" name="location" class="form-control" placeholder="Vị trí hiện tại của bạn">
        </div>
        <p><span>Bạn cần trợ giúp khẩn cấp? Hãy đăng tin lên ngay để bạn bè của bạn biét tin giúp đỡ.</span></p>
        <button type="submit" class="btn btn-success">Đăng Tin</button>    
      </form>
      <hr>
    </div>
  </div>
@endif  
  <div class="row">
    <div class="col-lg-8  ">
      <h4>Hiện có các lời kêu gọi/yêu cầu sau đây, mời bạn xem và trợ giúp nếu có thể:</h4>
      <hr>
      @if($data)
        @foreach($data as $want)
        <div class="col-xs-12">
        <?php 
          $students = DB::table('students')->select('name','avatar')->where('id', $want->student_id)->first();
          $avatar = $students->avatar;
         ?>
         <style type="text/css" media="screen">
              .boot{

                margin-top:10px; 
                padding-top: 5px;
                padding-bottom: 5px;
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
         <div class="row boot">
           <div class="col-lg-2">
            <img src="{{asset($avatar)}}" class="img-rounded" alt="">
            
           </div>
           <div class="col-lg-10 ">
            <h3><b>{!! $students->name !!}</b> <span style="margin-left: 150px;">{!! $want->updated_at!!}</span></h3>
           
             <p ><a style="color: black;" href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
           </div>
         </div>
         
          
          
        </div>
        @endforeach
    @else
      <p>Không ai thèm  muốn gì luôn đấy !</p>
    @endif 

    <div class="pagination pull-right">
          <ul class="list-inline">
          @if($data->currentPage() != 1)
            <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()- 1)) !!}">Prev</a></li>
          @endif  
            @for($i =1; $i<= $data->lastPage(); $i++)
            <li class="{!! ($data->currentPage() == $i) ? 'active' :'' !!}">
              <a href="{!! str_replace('/?','?',$data->url($i)) !!}">{!!$i!!}</a>
            </li>
            @endfor
          @if($data->currentPage() != $data->lastPage())  
            <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()+ 1)) !!}">Next</a></li>
          @endif
          </ul>
      </div>
       
    </div>
  </div>
</div>
@endsection
