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
      $teacher = DB::table('teachers')->select('name')->where('code', Auth::user()->username)->first();
     ?>
     @if( $teacher)
      <h2>{{$teacher->name}}</h2>
      <ul style="list-style: none; font-size: 20px;">
      <li><span class="glyphicon glyphicon-home" style="color: #e67e22;">&nbsp;</span><a href="{{route('dormitory.getSearch')}}" title="" class="bg-success">Nơi ở của sinh viên trong KTX</a></li>
      <li><span class="glyphicon glyphicon-map-marker" style="color: #e67e22;">&nbsp; </span><a href="{{url('rentHouse')}}" title="" class="bg-success">Nơi ở của sinh ngoài phòng trọ</a></li>
      <li><span class="glyphicon glyphicon-phone-alt" style="color: #e67e22;">&nbsp;</span><a href="{{url('/chat/classlist')}}" title="" class="bg-success">Chat với lớp</a></li>
    </ul>
     @endif
    
    </div>
    
  </div>
</div>
@endsection