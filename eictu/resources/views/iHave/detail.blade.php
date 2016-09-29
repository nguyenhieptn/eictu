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
                                    <div style="padding: 10px"><p>{{$have->content}}</p></div>
                                </div>
                             </div>
                        </div>

                    </div>
                    
                      <div class="entry-content">
                        <h4>Thông tin Sinh viên:</h4>
                          <ul>
                            <li>Họ và tên: <strong style="color:red">{{$student->name}}</strong></li>
                            <li>Địa chỉ: <strong style="color:red">{{$address}}</strong></li>
                          </ul>
                      </div>
                      <div style="margin-top: 30px">
                        <a class="btn btn-default item" href="{{ url('iHave') }}"><span class="glyphicon glyphicon-remove"></span>QUAY LẠI</a>
                        @if(Auth()->user()->username!=$student->code)
                            <a style="background: #cc5200;"  class=" btn btn-default item" href="/eictu/eictu/public/chat/friendroom?id=<?php echo Auth()->user()->username; ?>&friend=<?php echo $student->code;?>"><span class="glyphicon glyphicon-send"></span>  NHẮN TIN CHO NGƯỜI ĐĂNG</a>
                        @else
                            <a style="background: #cc5200;"  class=" btn btn-default item" href="{{url('iHave/update',$have->id)}}"><span class="glyphicon glyphicon-ok"></span>  ĐÃ CHO</a>
                        @endif
                      </div>
             </div>
         </div>
     </div>
 </div></div>
@endsection
