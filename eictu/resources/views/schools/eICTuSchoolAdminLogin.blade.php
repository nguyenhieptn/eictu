@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuSchoolAdminLogin - Quản trị Viên</div>
                    <div class="panel-body">
                        <form action="{{ url("schools/login")}}" method="post" class="form-horizontal">
                           Đây là trang đăng nhập cho quản trị viện của trường học.
                            <br/>
                            <br/>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Tài Khoản:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="user" name="user" placeholder="Tài Khoản">
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
                                    <button type="submit" class="btn btn-default">Submit</button>
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