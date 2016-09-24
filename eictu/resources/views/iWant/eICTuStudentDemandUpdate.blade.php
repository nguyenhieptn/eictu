@extends('layouts.app')

@section('content')
<div class="container">

<style type="text/css" media="screen">
  .panel-default>.panel-heading{
    background: #2ecc71;
    color: white;
  }
</style>
  <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default ">
                <div class="panel-heading iwant">Mong muốn của sinh viên</div>
                <div class="panel-body">
                 @if(Auth::check() && Auth::user()->type ==3)
                  <form action="{{route('iwant.status')}}" role="form" method="post" accept-charset="utf-8">
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                    <div class="form-group {{$errors->has('content')? ' has-error': ''}}">
                      <textarea placeholder="Bạn muốn gì, mọi người sẽ đáp ứng !" name="content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Đăng Tin</button>    
                  </form>

                  <hr>
                  @endif
      <h4>Hiện có các lời kêu gọi/yêu cầu sau đây, mời bạn xem và trợ giúp nếu có thể:</h4>
      <hr>
      @if($data)
        @foreach($data as $want)
        <div >
          <p style="font-weight: bold; font-size: 20px; color: black;"><span class="glyphicon glyphicon-play" style="color: #27ae60;">&nbsp;</span><a style="color: black;" href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
        </div>
        @endforeach
    @else
      <p>Không ai thèm muốn gì luôn đấy !</p>
    @endif 

  <div class="panel-body panel-body-2">
                        <ul class="find-job list-group">
                         <center> <h4 style="color:#e25252; font-weight:bold;margin-bottom:0 !important"></h4></center>
                            @foreach($data as $data=>$item)
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"aria-hidden="true"></span>
                                    <a href="{{route('findjob.detail',$item['id'])}}"><?php echo substr($item['content'], 0, 140)."[..]"?></a>
                                </li>
                            @endforeach
                        </ul>
                        {!!$data->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
