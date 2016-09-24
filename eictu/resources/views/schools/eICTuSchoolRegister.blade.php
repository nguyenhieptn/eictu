@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
                    <div class="thanhvien" >eICTuSchoolRegister - Đăng kí trường học mới</div>
                    <div class="panel-body">
                        <form action="{{ url("schools/rgm")}}" method="post" class="form-horizontal">
                        Để đăng kí trường học mới bạn cần đăng kí đầy đủ thông tin quản trị viên và thông tin nhà trường.
                        <br/>
                            <br/>
                         Thông Tin Trường Học:
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="viettat">Tên viết tắt:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="viettat" name="viettat" placeholder="Tên Viết Tắt">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="tendaydu">Tên đây đủ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tendaydu" name="tendaydu" placeholder="Tên đầy đủ">
                                </div>
                            </div>
                            Thông Tin quản trị viên:

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="hoten">Họ Và Tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ Và Tên">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="taikhoan">Tên Tài Khoản(Email):</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="taikhoan" name="taikhoan" placeholder="Tên Tài Khoản">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="matkhau">Mật Khẩu:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Mật Khẩu">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Đăng Ký</button>
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