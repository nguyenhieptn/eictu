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
              <div class="panel panel-default">
                  <div class="panel-heading">Tìm kiếm thông tin nhà trọ của sinh viên</div>

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
                <h2>Kết quả tìm kiếm:</h2>
                <ul class="list-group">
                 <?php
                    $stt=1;
                    foreach($data as $item){
                        $date = new DateTime($item->date_join);
                        ?>
                        <li class="list-group-item " style="color:red">
                        <?php
                            echo $date->format('d/m/Y').", nhà ông/bà: ".$item->hostess.", địa chỉ: ".$item->address;
                        ?>
                        </li>
                        <?php
                        }
                        ?>
                </ul>
                </div>
          </div>
      </div>
  </div>
  @endsection
