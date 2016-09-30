@extends('layouts.app')
@section('title')
eICTuStudentRentHouseHistory - Lịch sử nhà trọ
@endsection
  @section('content')
  <div class="container">
    <?php
    if(Auth::guest()){
    }
    elseif(auth()->user()->type==3){
      ?>
    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-info" STYLE="background:#cc5200" href="{{"rentHouse/create"}}"><h6 class="redirect"><i class="glyphicon glyphicon-plus"/>&nbsp;</i>CẬP NHẬT NHÀ TRỌ MỚI</h6></a>
            <a class="btn btn-info" STYLE="background:#cc5200" href="{{"rentHouse/search"}}"><h6 class="redirect"><i class="glyphicon glyphicon-search"/>&nbsp;</i>BẠN TÔI TRỌ Ở ĐÂU?</h6></a>
        </div>
    </div>
    <?php
    }
      ?>
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default renthouse_list">
                <ul class="" id="mylist">
                 <?php
                    if($data->count()==0){
                        echo "<li class='list-group-item' style='color:red'>Không có dữ liệu</li>";
                    }else{
                        foreach($data as $item){
                            $date = new DateTime($item->date_join);
                            echo "<li class='list-group-item' id='myLi' style=' color:red '>
                                <i class='glyphicon glyphicon-triangle-right' style='color:#8c8c8c'> &nbsp;</i>".$date->format('d/m/Y').", ".$item->hostess.", ".$item->address."</li>";
							}
                            echo "<center>".$data->appends(Request::only('code'))->links()."</center>";
                        }
                        ?>
                </ul>
                </div>
          </div>
      </div>
  </div>
  @endsection
