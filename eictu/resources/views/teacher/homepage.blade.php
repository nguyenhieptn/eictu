@extends('teacher.master')

@section('title')
Trang chu giao vien
@endsection

@section('content')
<div class="container">
    <div class="row">
    @if(Auth::user()->type == 1)
    	<div class="col-xs-4">
    		<h3><a href="{{route('teacher.add')}}" title="">Thêm giảng viên vào trường</a></h3>
    	</div>
      <div class="col-xs-4">
        <h3><a href="{{route('teacher.list')}}" title="">Danh sách Giảng Viên</a> </h3>
      </div>
    @endif

    @if(Auth::user()->type == 3)
      {{route('iwant.search')}}
    @endif  
    	
  </div>
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
  <div class="row">
    <div class="col-lg-9">
      <?php 
      $newfeed = DB::table('newsfeed')->select('*')->orderBy('id', 'DESC')->get();
     ?>
     @if(!empty($newfeed))
      @foreach($newfeed as $item)
          <?php 
            $student_id = DB::table('students')->where('id',$item->student_id )->first();
           ?>
         <div class="row boot">
           <div class="col-lg-2">
            <img src="{{url('{!! $student_id->name !!}')}}" alt="">
           </div>
           <div class="col-lg-9 ">
            <h3>{!! $student_id->name !!} <span style="margin-left: 200px; ">{!! time_elapsed_string('2016-10-01 00:13:01') !!}</span></h3>
            <p style="word-wrap:break-word;">{{$item->content}}</p>
           </div>
         </div>
      @endforeach  
    @endif
    </div>
    
  </div>
</div>
@endsection
