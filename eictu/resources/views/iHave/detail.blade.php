@extends('layouts.app')
@section('title')
eICTuStudentGoodsDetail - Chi tiết về bản tin đồ cũ
@endsection
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="panel panel-default">
         <div class="panel" style="padding: 10px">
           <ul type="none">
             <li style="float:left; padding:0px 10px 0px 10px; "><img  @if($student->avatar!=null) src="{{$student->avatar}}" @else src="{{url('img/avatar_null.png')}}" @endif height="50px" width="50px"/></li>
             <li style="float:left; padding-top: 8px">
               <ul type="none">
                 <li> <strong style="color: #000000; font-size: 18px">{{$student->name}}</strong></li>
                 <li style="color: #2e3436; font-size:14px;">
                    <span> @if ($student->gender==1) "am @else Nữ @endif</span>
                    <span>, đang ở {{$address}}</span>
                 </li>
               </ul>
             </li>
             <li style="clear:left; padding-top: 8px"> <p style="color: #000000; font-size: 18px">{{$have->content}}</p></li>
           </ul>
         </div>
         <div class="panel" style="padding:0px 20px 20px 10px;">
           <div style="margin-top: 30px;">
             <a class="btn btn-default item navbar-left" href="{{ url('iHave') }}"><span class="glyphicon glyphicon-remove"></span>QUAY LẠI</a>
             @if(auth()->check())
               @if(auth()->user()->username!=$student->code)
                 <a style="background: #cc5200;"  class=" btn btn-default item navbar-right" href="/eictu/eictu/public/chat/friendroom?id={{auth()->user()->username}}&friend={{$student->code}}"><span class="glyphicon glyphicon-send"></span>  NHẮN TIN CHO NGƯỜI ĐĂNG</a>
               @else
                 <a style="background: #cc5200;"  class=" btn btn-default item navbar-right" href="{{url('iHave/update',$have->id)}}"><span class="glyphicon glyphicon-ok"></span>  ĐÃ CHO</a>
               @endif
             @endif
           </div>
         </div>
       </div>
      </div>
   </div>
 </div>
@endsection
