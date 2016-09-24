@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 col-xs-12">
    <p>Sinh viên có nhu cầu muốn một cái gì đó như đi nhờ xe, vay thẻ điện
thoại, xin một chai nước, tìm một người đi chơi.. có thể đăng yêu cầu ở
đây:</p>
      <form action="{{route('iwant.status')}}" role="form" method="post" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <div class="form-group {{$errors->has('content')? ' has-error': ''}}">
          <textarea placeholder="What do you want ?" name="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Đăng Tin</button>    
      </form>
      <hr>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <h4>Hiện có các lời kêu gọi/yêu cầu sau đây, mời bạn xem và trợ giúp nếu có thể:</h4>
      <hr>
      @if($data)
        @foreach($data as $want)
        <div class="col-xs-12">
          <p style="font-weight: bold; font-size: 20px; color: black;"><span class="glyphicon glyphicon-play" style="color: #27ae60;">&nbsp;</span><a style="color: black;" href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
        </div>
        @endforeach
    @else
      <p>Khong ai them muon gi ca luon day !</p>
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
