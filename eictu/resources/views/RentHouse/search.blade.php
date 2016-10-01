@if(Auth()::check())
@if(Auth()::user()->type==3)
@extends('layouts.student_app')
@elseif(Auth::user()->type==2)
@extends('teacher.master')
@endif
@endif
@section('title')
eICTuStudentRentHouseSearch - Tra cứu địa chỉ nhà trọ của Sinh viên
@endsection
  @section('content')
  <div class="container" style="width:100%;padding-top:10px;">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">Tìm kiếm thông tin nhà trọ của sinh viên bằng mã số sinh viên.</div>
          <div class="panel-body">
            <form action="{{url("rentHouse/search")}}" method="post" class="navbar-form">
              <div class="input-group add-on" style="padding: 10px;height:50px;">
                <input style="padding: 15px;width: 300px; height: 50px" type="text" name="code" id="code" class="form" placeholder="Mã số sinh viên">
                <div class="input-group-btn">
                    <button type="submit" class="btn" style="background: #cc5200; padding: 15px; height:50px; width:100px; border-radius: 0px 8px 8px 0px"/><i class="glyphicon glyphicon-search" style="color:#ffffff"></i></button>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              </div>
            </form>
          </div>
            <ul style="padding:0px;">
              @if($student ==null && $code!=null)
                <li class='list-group-item' style="color:red;" >Không tồn tại sinh viên!</li>
              @elseif($student!=null)
                <li class='list-group-item' style="height:70px;border:0px;">
                  <ul type="none" style="padding:0px;">
                    <li style="float:left; padding-right: 10px; "><img width="50px" height="50px" border-radius="8px" src="<?php if($student->avatar!=null)echo $student->avatar;else ?>{{url('img/avatar_null.png')}}" /></li>
                    <li style="float:left;">
                      <ul type="none" style="padding:0px;">
                        <li> <strong style="color: #000000; font-size: 18px"><?php echo $student->name;?></strong></li>
                        <li style="color: #2e3436; font-size:14px;">Mã sinh viên <strong><?php echo $student->code;?></strong></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <?php
                  if($data==null){
                    echo "<li class='list-group-item' style='color:red'>Không có thông tin trọ</li>";
                  }else{
                    foreach($data as $item){
                      $date = new DateTime($item->date_join);
                      echo "<li class='list-group-item' id='myLi' style=' color:red;border:0px; '>
                        <i class='glyphicon glyphicon-triangle-right' style='color:#8c8c8c;padding-right: 10px;'> </i>".$date->format('d/m/Y')."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$item->address."</li>";
                    }
                    echo "<center>".$data->appends(Request::only('code'))->links()."</center>";
                  }
                ?>
              @endif
            </ul>
          </div>
      </div>
      </div>
  </div>
  @endsection
