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
      <div class="row">
          <div class="col-md-12">
              <div class="list-group">
                 <a href="{{"rentHouse/create"}}" class="list-group-item active">SINH VIÊN CẬP NHẬT</a>
               </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Tìm kiếm thông tin nhà trọ của sinh viên bằng mã số sinh viên</div>
                  <div class="panel-body">
                      <form action = "{{url("rentHouse")}}" method = "post" class="form-horizontal">
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="code">Mã sinh viên:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" name="code" value="">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Tìm kiếm</button>
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                      </form>
                  </div>
              </div>
              <div class="container">
                <h2>Kết quả tìm kiếm: <strong><?php echo $name; ?></strong></h2>
                <ul class="list-group">
                 <?php
                    $stt=1;
                    if(isset($data)){
                        foreach($data as $item){
                            $date = new DateTime($item->date_join);
                            echo "<li class='glyphicon glyphicon-play list-group-item ' style=' color:red '>".$date->format('d/m/Y').", ".$item->hostess.", ".$item->address."</li>";
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
