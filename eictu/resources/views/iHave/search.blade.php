@extends('layouts.app')
@section('content')
    <div class="container find-job">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div style="background:#026086; height:40px; padding: 8px;">
                       <strong  style="color:#ffffff; font-size:20px; font-weight: 600px;">eICTuStudentGoodsSearch - Danh sách đồ cũ đang rao
                            @if(!Auth::guest())
                                <a  style="color:#ffffff; font-size:20px; font-weight: 600px;"href="{!! url('dormitory/logout') !!}" title="logout" class="pull-right">Logout</a>
                            @endif
                       </strong>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                         <a href="{{url("iHave/update")}}" class="list-group-item active">SINH VIÊN RAO ĐỒ CŨ CẦN CHO/TẶNG</a>
                        </div>
                        <div><a>Hiện có các bản tin rao đồ cũ sau đây:</a></div>
                        <ul class="find-job list-group">
                            @foreach($data as $item)
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"aria-hidden="true"></span>
                                    <a href="{{url('iHave/detail', $item->id)}}"><?php echo $item->content;?></a>
                                </li>
                            @endforeach
                        </ul>
                        {!!$data->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
