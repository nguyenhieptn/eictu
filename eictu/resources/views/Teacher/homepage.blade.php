@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-xs-3">
    		<p><a href="{{route('teacher.add')}}" title="">Thêm giảng viên vào trường</a></p>
    	</div>
    	<div class="col-xs-3">
    		<p><a href="{{route('teacher.list')}}" title="">Danh sách Giảng Viên</a> </p>
    	</div>
  </div>

  <div class="row">
  	<ul style="list-style: none; font-size: 20px;">
      <li><span class="glyphicon glyphicon-home" style="color: #e67e22;">&nbsp;</span><a href="{{route('dormitory.getSearch')}}" title="" class="bg-success">Nơi ở của sinh viên trong KTX</a></li>
      <li><span class="glyphicon glyphicon-map-marker" style="color: #e67e22;">&nbsp; </span><a href="{{url('rentHouse')}}" title="" class="bg-success">Nơi ở của sinh ngoài phòng trọ</a></li>
      <li><span class="glyphicon glyphicon-phone-alt" style="color: #e67e22;">&nbsp;</span><a href="" title="" class="bg-success">Chat với lớp</a></li>
    </ul>
  </div>
</div>
@endsection