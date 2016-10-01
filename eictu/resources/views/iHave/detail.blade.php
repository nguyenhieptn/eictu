@extends('layouts.student_app')
@section('title')
eICTuStudentGoodsDetail - Chi tiết về bản tin đồ cũ
@endsection
@section('content')
 <div class="container" style="width: 100%">
   <div class="row">
       <div class="panel panel-default">
         <div class="panel" style="padding: 10px">
           <ul type="none" style="padding:0px;">
             <li style="float:left; padding:0px 10px 0px 10px; "><img  @if($student->avatar!=null) src="{{$student->avatar}}" @else src="{{url('img/avatar_null.png')}}" @endif height="50px" width="50px"/></li>
             <li style="float:left;">
               <ul type="none" style="padding:0px;">
                 <li> <strong style="color: #000000; font-size: 18px">{{$student->name}}</strong> </li>
                 <li style="color: #2e3436; font-size:14px;">
                    <span> @if ($student->gender==1) Nam @else Nữ @endif</span>
                    <span>, đang ở @if($address!=null){{$address}}@else không xác định @endif</span>
                 </li>
               </ul>
             </li>
             <li class="pull-right date-post">
                 <p>
                    @if(date('d-m-Y',strtotime($have->created_at)) == date("d-m-Y",time()))
                      {{date('H:i',strtotime($have->created_at))}}
                    @elseif(date('d-m-Y',strtotime($have->created_at)) ==(date("d-m-Y",time()-86400)))
                      Hôm qua
                    @elseif(date('d-m-Y',strtotime($have->created_at)) ==(date("d-m-Y",time()-2*86400)))
                      Hôm kia
                    @else
                      {{date('d-m-Y',strtotime($have->created_at))}}
                  @endif
                  </p>
             </li>
             <li style="clear:left; padding-top: 8px"> <p style="color: #000000; font-size: 18px">{{$have->content}}</p></li>
           </ul>
         </div>
         <div class="panel" style="padding:0px 20px 20px 10px;">
           <div style="margin-top: 30px;">
             <a class="btn btn-danger item navbar-left" href="{{ url('iHave') }}"><span class="glyphicon glyphicon-remove"></span>QUAY LẠI</a>
             @if(auth()->check())
               @if(auth()->user()->username!=$student->code)
                 <a style="background: #cc5200;"  class=" btn btn-warning item navbar-right" href="/chat/friendroom?id={{auth()->user()->username}}&friend={{$student->code}}"><span class="glyphicon glyphicon-send"></span>  NHẮN TIN CHO NGƯỜI ĐĂNG</a>
               @else
                 <a style="background: #cc5200;"  class=" btn btn-warning item navbar-right" href="{{url('iHave/update',$have->id)}}"><span class="glyphicon glyphicon-ok"></span>  ĐÃ CHO</a>
               @endif
             @endif
           </div>
         </div>
       </div>
   </div>
 </div>
@endsection
