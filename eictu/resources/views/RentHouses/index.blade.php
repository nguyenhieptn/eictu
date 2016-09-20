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
                 <div class="panel-heading">Dashboard</div>

                 <div class="panel-body">
                     <a href="{{url("renthouses/create")}}"> Cập nhật </a>
                     <a href="{{url("renthouses/search")}}"> Tra cứu </a>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
