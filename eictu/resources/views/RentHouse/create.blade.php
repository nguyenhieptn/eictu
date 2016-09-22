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
                 <div class="panel-heading">Cập nhật thông tin về nhà trọ hiện tại</div>

                 <div class="panel-body">
                     <form action = "{{url("rentHouse/create")}}" method = "post" class="form-horizontal">
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="student_id"></label>
                         <div class="col-sm-10">
                           <input type="hidden" class="form-control" id="student_id" name="student_id" value="1">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="hostess">Họ và tên chủ hộ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="hostess" name="hostess" placeholder="Nhập họ tên">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="address">Địa chỉ nhà trọ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="date_join">Ngày bắt đầu ở:</label>
                         <div class="col-sm-10">
                           <input type="date" class="form-control" id="date_join" name="date_join"/>
                         </div>
                       </div>
                       <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-default">Cập nhật</button>
                         </div>
                       </div>
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                     </form>

                      <div class="container">
                          <h2>Thông tin của bạn</h2>
                          <ul class="list-group">
                          <?php
                            $stt=1;
                            foreach($data as $item){
                                $date = new DateTime($item->date_join);
                                echo "<li class='list-group-item list-group-item-danger'>".$date->format('d/m/Y').", ".$item->hostess.", ".$item->address."</li>";
                            }
                            echo "<center>".$data->render()."</center>";
                          ?>
                          </ul>
                      </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
