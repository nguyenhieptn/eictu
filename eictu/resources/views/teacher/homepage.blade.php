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
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
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
  <div class="row">
    <div class="col-xs-8">
      <?php 
      $feed = DB::table('newsfeed')->select('*')->orderBy('id', 'DESC')->get();


     ?>
     @if(!empty($feed))
       @foreach($feed as $item)
       <?php 
            $st = DB::table('students')->where('id', $item->student_id)->get()->toArray();
            foreach ($st as $values) {
              $aaa= $values->avatar;
            }
           ?>
       <div class='media boot'>
         <a href='' class='media-left' href='#'><img class='media-object' src="{!!asset($aaa)!!}" class="img-rounded" src="" alt=''></a>
         <div class='media-body'> 
          <p class="pull-right date-post">{!! time_elapsed_string($item->time) !!}</p>
          <h4 class='media-heading'><strong>
            <?php 
              foreach ($st as $value) {
                echo $value->name;
            }
             ?>

          </strong></h4>
         
        </div>
      </div>  

         
       @endforeach
      @endif
    
    </div>
    
  </div>
</div>
@endsection
