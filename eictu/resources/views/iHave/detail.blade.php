@extends('layouts.app')
@section('content')
	 <div class="container find-job">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div style="background:#026086; height:40px; padding: 8px;">
                   <strong  style="color:#ffffff; font-size:20px; font-weight: 600px;">eICTuStudentGoodsDetail - Chi tiết về bản tin đồ cũ
                        @if(!Auth::guest())
                            <a  style="color:#ffffff; font-size:20px; font-weight: 600px;"href="{!! url('dormitory/logout') !!}" title="logout" class="pull-right">Logout</a>
                        @endif
                   </strong>
                 </div>
                 <div class="panel-body">
                    <div class="entry-content">
                        <h4>Thông tin về đồ đạc:</h4>
                        <p>{{$have}}</p>

                    </div>
                    </hr>
                      <div class="entry-content">
                        <h4>Thông tin Sinh viên:</h4>
                          <ul>
                            <li>Họ và tên: <strong style="color:red">{{$student}}</strong></li>
                            <li>Địa chỉ: <strong style="color:red">{{$address}}</strong></li>
                          </ul>
                      </div>
                     <div style="margin-top: 30px">
                         <center><span  class="btn btn-default"> <a href="{{ url('iHave') }}"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>  ĐÓNG</a></span></center>
                     </div>
             </div>
         </div>
     </div>
 </div>
@endsection
