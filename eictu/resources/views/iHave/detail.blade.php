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
             <li style="float:left; padding:0px 10px 0px 10px; "><img src="<?php if($student->avatar!=null)echo $student->avatar;else ?>{{url('img/avatar_null.png')}}" height="50px" width="50px"/></li>
             <li style="float:left; padding-top: 8px">
               <ul type="none">
                 <li> <strong style="color: #000000; font-size: 18px"><?php echo $student->name;?></strong></li>
                 <li style="color: #2e3436; font-size:14px;">
                    <span><?php if ($student->gender==1)echo "Nam"; else echo "Nữ";?></span>
                    <span>, đang ở <?php echo $address; ?></span>
                 </li>
               </ul>
             </li>
             <li style="clear:left; padding-top: 8px"> <p style="color: #000000; font-size: 18px"><?php echo $have->content;?></p></li>
           </ul>
         </div>
         <div class="panel" style="padding: 10px">
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
   </div>
 </div>
@endsection
