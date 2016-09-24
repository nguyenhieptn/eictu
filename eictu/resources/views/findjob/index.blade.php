@extends('layouts.app')
@section('content')
    <div class="container find-job">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuStudentNeedJob - Trang tin tìm việc làm của Sinh viên</div>
                    <div class="panel-body">
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class=" alert alert-success"> {{\Illuminate\Support\Facades\Session::get('success')}}</div>
                        @endif
                        @if(Auth()->user()->type == 3)
                        <h3 class=" btn btn-default btn-sm btn-link-post"><a href="{{ route('findjob.post') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sinh viên đăng tin</a></h3>
                        @endif
                        <ul class="find-job list-group">
                        <h4>Các bản tin của sinh viên tìm việc:</h4>
                            @foreach($datas as $data=>$item)
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"aria-hidden="true"></span>
                                    <a href="{{route('findjob.detail',$item['id'])}}"><?php echo _sub($item['content'], 140, 3,route('findjob.detail', $item['id']))?></a>
                                </li>
                            @endforeach
                        </ul>
                        {!!$datas->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection