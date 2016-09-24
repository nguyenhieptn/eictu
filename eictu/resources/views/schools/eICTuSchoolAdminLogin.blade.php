@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
                    <div class="thanhvien">eICTuSchoolAdminLogin - Quản trị Viên</div>
                    <div class="panel-body">
                        <form action="{{ url("schools/login")}}" method="post" class="form-horizontal">
                           Đây là trang đăng nhập cho quản trị viện của trường học.
                            <br/>
                            <br/>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="username">Tài Khoản:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Tài Khoản">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">Mật Khẩu:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Mật Khẩu">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Đăng Nhập</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection