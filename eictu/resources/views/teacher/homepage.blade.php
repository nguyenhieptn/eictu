@extends('teacher.master')

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
    <div class="col-xs-8">
      <?php 
      $feed = DB::table('newsfeed')->select('*')->get();


     ?>
     @if(!empty($feed))
       @foreach($feed as $item)
       <div class="row boot">
       <?php 
            $students = DB::table('students')->where('id', $item->student_id)->get();
            
           ?>
          
          <div class="col-lg-2">
               @foreach($students as $student)
                <img src="{!!asset('/upload/avatar/'.$student->avatar)!!}" height="100px" width="100px" />
               @endforeach
            <h4>
                @foreach($students as $student)
                {{$student->name}}
               @endforeach
            {{$item->time}}</h4>
          </div>
          <div class="col-lg-10 ">
          
            
             <p ><a style="color: black;" >{{$item->content}}</a></p>
          </div>
        </div>
         
       @endforeach
      @endif
    
    </div>
    
  </div>
</div>
@endsection
