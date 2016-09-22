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
                      <li class="active"><a href="{{ url('rentHouse') }}">Rent House</a></li>
                      <li><a href="{{ url('rentHouse/create') }}">Update</a></li>
                      <li><a href="{{ url('rentHouse/search') }}">Find</a></li>
                    </ul>
                  </div>
                </nav>
                 <div class="panel-heading">Trang chủ</div>
                 <div class="panel-body">
                     <table class="table">
                         <thead>
                           <tr>
                             <th>#</th>
                             <th>Ngày vào trọ</th>
                             <th>Họ tên chủ nhà</th>
                             <th>Địa chỉ nhà trọ</th>
                           </tr>
                         </thead>
                         <tbody>
                           <?php
                                $stt=1;
                                foreach($data as $key){
                                echo "<tr>";
                                echo "<td>$stt++</td>";
                                echo "<td>$key->ngayvaotro</td>";
                                echo "<td>$key->hotenchunha</td>";
                                echo "<td>$key->diachinhatro</td>";
                                echo "</tr>";
                                }
                           ?>
                         </tbody>
                       </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
