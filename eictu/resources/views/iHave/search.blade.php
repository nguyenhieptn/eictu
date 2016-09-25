@extends('layouts.app')
@section('title')
eICTuStudentGoodsSearch - Danh sách đồ cũ đang rao
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-sm-12">
                             <a STYLE=" color:#000; padding-left: 20px; " href="{{"iHave/update"}}"><h4 class="redirect"><i class="glyphicon glyphicon-star"></i>SINH VIÊN RAO ĐỒ CŨ CẦN CHO/TẶNG</h4></a>
                        </div>
                    </div>
                    <div style="padding-left: 20px; padding-bottom: 15px;">Hiện có các bản tin rao đồ cũ sau đây: </div>
                    <ul class=" list-group " >
                        @foreach($data as $item)
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>
                                <a href="{{url('iHave/detail', $item->id)}}"><?php echo $item->content;?></a>
                            </li>
                        @endforeach
                        
                    </ul>
                    <center>{!!$data->render()!!}</center>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
