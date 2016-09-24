<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 20/09/2016
 * Time: 8:48 SA
 */
 ?>
 <?php
 /**
  * Created by PhpStorm.
  * User: Admin
  * Date: 19/09/2016
  * Time: 11:41 CH
  */

  ?>
  @extends('layouts.app')

  @section('content')
  <div class="container">
     <div style="background:#cc5200; height:40px; padding: 8px;">
        <strong  style="color:#ffffff; font-size:20px; font-weight: 600px;">eICTuStudentRentHouseSearch - Tra cứu địa chỉ nhà trọ của Sinh viên
            @if(!Auth::guest())
                <a  style="color:#ffffff; font-size:20px; font-weight: 600px;"href="{!! url('dormitory/logout') !!}" title="logout" class="pull-right">Logout</a>
            @endif
        </strong>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a STYLE="color:#000;" href="{{"rentHouse/create"}}"><h3 class="redirect"><i class="glyphicon glyphicon-star">&nbsp;</i>SINH VIÊN CẬP NHẬT NHÀ TRỌ</h3></a>
        </div>
    </div>
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Đây là màn hình tìm kiếm thông tin nhà trọ của sinh viên bằng mã số sinh viên.</div>
                  <div class="panel-body">
                    <form action="{{url("rentHouse")}}" method="get" class="form-horizontal" accept-charset="utf-8">
                        <div class="form-group" style="padding:8px;">
                            <label class="col-sm-3 control-label" ><i class=" glyphicon glyphicon-search">&nbsp;</i>Mã số sinh viên:</label>
                            <div class="col-sm-4">
                                <input type="text" name="code" value="" class="form-control" placeholder="DTC...">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn" style="background: #000;"><strong style="color:#ffffff">Tìm kiếm</strong></button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
              <div class="container">
                <strong>Kết quả tìm kiếm: </strong><strong style="color:#c7254e;"><?php echo $name; ?></strong>
                <ul class="list-group">
                 <?php
                    $stt=1;
                    if(isset($data)){
                        foreach($data as $item){
                            $date = new DateTime($item->date_join);
                            echo "<li class='list-group-item ' style=' color:red '>
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
