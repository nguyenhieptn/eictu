@extends('layouts.app')
@section('content')
    <div class="container find-job">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Trang tin tìm việc làm của Sinh viên </div>
                    <div class="panel-body">
                       @if(Auth::check() && Auth::user()->type ==3)
                        <form action="{{route('findjob.post.add')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail2"> Đăng tin tìm việc </label>
                                   @if(count($errors)>0)
                                      <span class="text-danger"> <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{ $errors->first('content') }}</span> 
                                    @endif
                                <textarea class="form-control" cols="30" rows="3" name="content"> </textarea>
                                <button type="submit" class="btn btn-success pull-right" style="margin-top:3px"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Đăng Tin</button>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="panel-body panel-body-2">
                        <ul class="find-job list-group">
                         <center> <h4 style="color:#e25252; font-weight:bold;margin-bottom:0 !important">[ Các bản tin của sinh viên tìm việc]</h4></center>
                            @foreach($datas as $data=>$item)
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-triangle-right"aria-hidden="true"></span>
                                    <a href="{{route('findjob.detail',$item['id'])}}"><?php echo _sub($item['content'], 140, 3)?></a>
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
