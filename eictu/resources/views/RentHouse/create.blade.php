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
        <strong  style="color:#ffffff; font-size:20px; font-weight: 600px;">eICTuStudentRentHouseSearch - Sinh viên Khai báo nhà trọ
            @if(!Auth::guest())
                <a  style="color:#ffffff; font-size:20px; font-weight: 600px;"href="{!! url('dormitory/logout') !!}" title="logout" class="pull-right">Logout</a>
            @endif
        </strong>
    </div>
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">Cập nhật thông tin nhà trọ tại đây.</div>
                 <div class="panel-body">
                     <form action = "{{url("rentHouse/create")}}" method = "post" class="form-horizontal">
                       <div class="form-group">
                         <label class="col-form-label col-sm-2" for="hostess">
                            <i class="glyphicon glyphicon-user">&nbsp;</i> Họ và tên chủ hộ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="hostess" name="hostess" placeholder="Nhập họ tên">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-form-label col-sm-2" for="address">
                         <i class="glyphicon glyphicon-user">&nbsp;</i>Địa chỉ nhà trọ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="col-form-label col-sm-2" for="date_join">
                         <i class="glyphicon glyphicon-user">&nbsp;</i>Ngày bắt đầu ở:</label>
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
                          <strong>Thông tin của bạn</strong>
                          <ul class="list-group">
                          <?php
                            $stt=1;
                            foreach($data as $item){
                                $date = new DateTime($item->date_join);
                                echo "<li class='list-group-item ' style=' color:red '><i class='glyphicon glyphicon-triangle-right' style='color:#8c8c8c'> &nbsp;</i>".$date->format('d/m/Y').", ".$item->hostess.", ".$item->address."</li>";
                            }
                            echo "<center>".$data->links()."</center>";
                          ?>
                          </ul>
                      </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
