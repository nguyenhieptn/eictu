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
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">
                      <ul class="nav navbar-nav">
                        <li><a href="{{ url('rentHouse') }}">Rent House</a></li>
                        <li class="active"><a href="{{ url('rentHouse/create') }}">Update</a></li>
                        <li><a href="{{ url('rentHouse/search') }}">Find</a></li>
                      </ul>
                    </div>
                  </nav>
                 <div class="panel-heading">Cập nhật thông tin về nhà trọ hiện tại</div>

                 <div class="panel-body">
                     <form action = "{{url("rentHouse")}}" method = "post" class="form-horizontal">
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="id_sinhvien"></label>
                         <div class="col-sm-10">
                           <input type="hidden" class="form-control" id="id_sinhvien" name="id_sinhvien" value="1">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="hotenchutro">Họ và tên chủ hộ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="hotenchutro" name="hotenchutro" placeholder="Nhập họ tên">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="diachinhatro">Địa chỉ nhà trọ:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="diachinhatro" name="diachinhatro" placeholder="Nhập địa chỉ">
                         </div>
                       </div>
                       <div class="form-group">
                         <label class="control-label col-sm-2" for="ngayvaotro">Ngày bắt đầu ở:</label>
                         <div class="col-sm-10">
                           <input type="date" class="form-control" id="ngayvaotro" name="ngayvaotro"/>
                         </div>
                       </div>
                       <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-default">Cập nhật</button>
                         </div>
                       </div>
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
