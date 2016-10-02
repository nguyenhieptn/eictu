<?php
    $file='layouts.student_app';
    if (auth()->check() && auth()->user()->type==3)
    $file='layouts.student_app';
    elseif(Auth::check() && Auth::user()->type==2)
    $file='teacher.master';
?>
@extends($file);
@section('title')
eICTuStudentGoodsSearch - Danh sách đồ cũ đang rao
@endsection
@section('content')
<script src="//assets.codepen.io/assets/common/stopExecutionOnTimeout-53beeb1a007ec32040abaf4c9385ebfc.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

$(function () {
    $(".myList").slice(0, 4).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".myList:hidden").slice(0, 4).slideDown();
        if ($(".myList:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
});
</script>

<style>
.myList {
    display:none;
    padding: 10px;
    border-width: 0 1px 1px 0;
    border-style: solid;
    border-color: #fff;
    box-shadow: 0 1px 1px #ccc;
    margin-bottom: 5px;
    background-color: #f1f1f1;
}
#loadMore{
    cursor:pointer;
}
</style>

<div class="container" style="width: 100%">
    @if(Auth::check() && Auth::user()->type==3)
      <div class="row">
        <div class="col-lg-8 col-xs-12">
          <form  class="nav-form" action="{{url('iHave')}}" role="form" method="post" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <div class="input-group add-on" style="padding: 10px; height: 70px" >
              <textarea style="height: 70px" placeholder="Mô tả tài sản cũ của bạn ở đây để cả thế giới biết.Cho đi chính là đã nhận về." name="content" class="form-control" rows="2"></textarea>
              <div class="input-group-btn">
                <button type="submit" class="btn" style="background: #ff7b07; color: #ffffff; height: 70px;border-radius: 0 8px 8px 0px;">ĐĂNG NGAY</button>
              </div>
            </div>
          </form>
          <span>Bạn có sách cũ, đồ dùng cũ, quần áo cũ, bàn ghế cũ, xe đạp cũ… hãy cho đi để nhận lại.</span>
          <hr>
        </div>
      </div>
    @endif
  <div class="row">
    <div class="col-lg-12">
      <div style="padding-left: 23px;">Các đồ cũ đang có trong chợ.</div>
      <ul type="none" class="list-group">
        @foreach($data as $item)
          <li style="height:80px; padding-top: 10px" class="myList"><a style="height:70px;" class="list-group-item" href="{{url('iHave/detail', $item->id)}}">
            <ul type="none" style="padding:0px;">
              <li style="float:left; padding-right: 10px;"><img @if($item->avatar!=null) src="{{$item->avatar}}" @else src="{{url('img/avatar_null.png')}}" @endif height="50px" width="50px"/></li>
              <li>
                <ul type="none">
                  <li>{{$item->name}}
                    <p class="pull-right date-post">
                       @if(date('d-m-Y',strtotime($item->created_at)) == date("d-m-Y",time()))
                         {{date('H:i',strtotime($item->created_at))}}
                       @elseif(date('d-m-Y',strtotime($item->created_at)) ==(date("d-m-Y",time()-86400)))
                         Hôm qua
                       @elseif(date('d-m-Y',strtotime($item->created_at)) ==(date("d-m-Y",time()-2*86400)))
                         Hôm kia
                       @else
                         {{date('d-m-Y',strtotime($item->created_at))}}
                     @endif
                     </p>
                  </li>
                  <li>{{str_limit($item->content,100,'...')}}</li>
                </ul>
              </li>
            </ul>
          </a></li>
        @endforeach
      </ul>
      <center><span style="padding-bottom: 20px" id="loadMore">Load More</span></center>
    </div>
  </div>
</div>
@endsection
