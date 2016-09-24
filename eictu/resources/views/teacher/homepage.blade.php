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

  <div class="row">
    <div class="col-xs-10">
      <?php 
      $teacher = DB::table('teacher')->select('name')->where('code', Auth::user()->username)->first();
     ?>

       
     @if( $teacher)
      <h2>Giảng viên :{{$teacher->name}}</h2>
      <ul style="list-style: none; font-size: 20px;">
      <li><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span><a href="{{route('dormitory.getSearch')}}" title="" >Nơi ở của sinh viên trong KTX</a></li>
      <li><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp; </span><a href="{{url('rentHouse')}}" title="" >Nơi ở của sinh ngoài phòng trọ</a></li>
      <li><span class="glyphicon glyphicon-play" style="color: #2c3e50;">&nbsp;</span><a href="{{url('/chat/classlist')}}" title="" >Chat với lớp</a></li>
    </ul>
     @endif

    
    </div>
    
  </div>
</div>
@endsection