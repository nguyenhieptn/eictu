@extends('layouts.app')
@section('title')
eICTuStudentGoodsDetail - Chi tiết về bản tin đồ cũ
@endsection
@section('content')
	 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 
                 <div class="panel-body">
                    <div class="entry-content">
                        <h4>Thông tin về đồ đạc:</h4>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div style="padding: 10px"><p>{{$have}}</p></div>
                                </div>
                             </div>
                        </div>

                    </div>
                    
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
 </div></div>
@endsection
