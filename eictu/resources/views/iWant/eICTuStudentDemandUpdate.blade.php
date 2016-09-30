@extends('layouts.student_app')
@section('title')
Đăng tin - Danh sách những mong muốn
@endsection
@section('content')
<div class="container">
@if(Auth::check() && Auth::user()->type ==3)
  <div class="row">
        <div class="col-lg-8 col-xs-12">
          <form  class="nav-form" action="{{route('iwant.status')}}" role="form" method="post" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <div class="input-group add-on" style="padding: 10px; height: 70px" >
              <textarea style="height: 70px" placeholder="Gõ bản tin đề nghị giúp đỡ của bạn vào đây…
          Chúc bạn may mắn!" name="content" class="form-control" rows="2"></textarea>

              <div class="input-group-btn">
                <button type="submit" class="btn" style="background: #ff7b07; color: #ffffff; height: 70px; border-radius: 0 8px 8px 0px; font-size: 20px; ">ĐĂNG NGAY</button>
              </div>
            </div>
          </form>
          <span>Bạn cần trợ giúp khẩn cấp? Hãy đăng tin lên ngay để bạn bè của bạn biét tin giúp đỡ.</span>
          <hr>
        </div>
      </div>
@endif  
  <div class="row">
    <div class="col-lg-8  ">
      <h4>Hiện có các lời kêu gọi/yêu cầu sau đây, mời bạn xem và trợ giúp nếu có thể:</h4>
      <hr>
      @if($data)
        @foreach($data as $want)
        <div class="col-xs-12">
        <?php 
          $students = DB::table('students')->select('name','avata')->where('id', $want->student_id)->first();
         ?>
         <style type="text/css" media="screen">
              .boot{

                margin-top:10px; 
                padding-top: 5px;
                padding-bottom: 5px;
                background: #ecf0f1;

                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }
              img{
                width: 100px;
                height: 100px;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
              }
            </style>
         <div class="row boot">
           <div class="col-lg-2">
            <img src="$students->avatar" class="img-rounded" alt="">
            
           </div>
           <div class="col-lg-10 ">
            <h3>{!! $students->name !!}</h3>
             <p ><a style="color: black;" href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
           </div>
         </div>
         
          
          
        </div>
        @endforeach
    @else
      <p>Không ai thèm  muốn gì luôn đấy !</p>
    @endif 

    <div class="pagination pull-right">
          <ul class="list-inline">
          @if($data->currentPage() != 1)
            <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()- 1)) !!}">Prev</a></li>
          @endif  
            @for($i =1; $i<= $data->lastPage(); $i++)
            <li class="{!! ($data->currentPage() == $i) ? 'active' :'' !!}">
              <a href="{!! str_replace('/?','?',$data->url($i)) !!}">{!!$i!!}</a>
            </li>
            @endfor
          @if($data->currentPage() != $data->lastPage())  
            <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()+ 1)) !!}">Next</a></li>
          @endif
          </ul>
      </div>
       
    </div>
  </div>
</div>
@endsection
