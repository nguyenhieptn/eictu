@extends('layouts.student_app')
@section('title')
eICTuStudentRentHouseHistory - Lịch sử nhà trọ
@endsection
  @section('content')
  <div class="container" style="width:100%">
    <div class="row">
        <a class="btn btn-info" style="background:#cc5200;color: #ffffff;" href="{{"rentHouse/create"}}">
          <strong class="redirect"><i class="glyphicon glyphicon-plus"/>&nbsp;</i>CẬP NHẬT NHÀ TRỌ MỚI</strong>
        </a>
        <a class="btn btn-info" style="background:#cc5200;color: #ffffff;" href="{{"rentHouse/search"}}">
          <strong class="redirect"><i class="glyphicon glyphicon-search"/>&nbsp;</i>BẠN TÔI TRỌ Ở ĐÂU?</strong>
        </a>
    </div>
      <div class="row" style="padding-top: 30px;">
          <div class="panel">
            <ul class="" id="mylist">
             <?php
                if($data->count()==0){
                    echo "<li class='list-group-item' style='color:red'>Không có dữ liệu</li>";
                }else{
                    foreach($data as $item){
                        $date = new DateTime($item->date_join);
                        echo "<li class='list-group-item' id='myLi' style=' color:red; border:0px'>
                            <i class='glyphicon glyphicon-triangle-right' style='color:#8c8c8c;padding-right: 10px;'></i>".$date->format('d/m/Y')."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$item->address."</li>";
                        }
                        echo "<center>".$data->appends(Request::only('code'))->links()."</center>";
                    }
                    ?>
            </ul>
            </div>
          </div>
  </div>
  @endsection