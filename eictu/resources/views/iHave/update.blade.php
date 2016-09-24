@extends('layouts.app')
@section('content')
    <div class="container find-job ">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div style="background:#026086; height:40px; padding: 8px;">
                       <strong  style="color:#ffffff; font-size:20px; font-weight: 600px;">eICTuStudentGoodsUpdate - Đăng tin đồ cũ
                            @if(!Auth::guest())
                                <a  style="color:#ffffff; font-size:20px; font-weight: 600px;"href="{!! url('dormitory/logout') !!}" title="logout" class="pull-right">Logout</a>
                            @endif
                       </strong>
                    </div>
                    <div class="panel-body">
                        <p>Sinh viên có đồ dùng cũ, sách cũ, … không có nhu cầu sử dụng có thể đem cho thì đăng tin ở đây để tìm người cần dùng:</p>
                        @if(count($errors)>0)
                              <div class="alert alert-danger">
                                  {{ $errors->first('content') }}
                              </div>
                        @endif
                        <form action="{{url("iHave/update")}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="content">Giới thiệu khả năng:</label>
                                <textarea class="form-control" cols="30" rows="5" name="content"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-default"> Đăng Tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
