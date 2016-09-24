@extends('layouts.app')
@section('content')
    <div class="container find-job">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"> <center> Trang tin tìm việc làm của Sinh viên </center></div>
                    <div class="panel-body">
                        <form action="{{route('findjob.post.add')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail2"> Đăng tin tìm việc </label>
                                <textarea class="form-control" cols="30" rows="3" name="content"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-default"> Đăng Tin</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        @if(\Illuminate\Support\Facades\Session::has('lock'))
                          <script type='text/javascript'>alert('vui lòng đăng nhập tài khoản sinh viên để thực hiện chức năng này')</script>
                        @endif
                      <h3 class=" btn btn-default btn-sm btn-link-post"><a href="{{ route('findjob.post') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sinh viên đăng tin</a></h3>

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
