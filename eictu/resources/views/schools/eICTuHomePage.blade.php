
@extends('layouts.app')
@section('title')
    <span>Đây là hệ sinh thái dành cho các trường đại học</span>
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{{url('quanlytruong/css/eICTuHomePage.css')}}">
                    <div class="trangchu" > Trang Chủ</div>
                    <div class="body">
                        Nếu Bạn Là giáo viên, hãy chọn.
                        <br/>

                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{route('teacher.login')}}">Giáo Viên</a>


                        <br />
                        <br/>
                        Nếu Bạn Là Sinh Viên, hãy chọn.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{url('student/login')}}">Sinh Viên</a>
                        <br />
                        <br/>
                        Nếu Bạn Là Quản Trị Viên của trường học đã tham gia eICTu, hãy chọn.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{url('schools/login')}}">Trường Học</a>
                        <br />
                        <br/>
                        Nếu Trường Đại Học của bạn chưa tham gia eICTu, hãy bắt đầu tham gia.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{url('/schools/eICTuSchoolRegister')}}">Đăng Kí</a>
                        <br />
                        <br/>
                        Nếu Bạn Là Người Cần Tuyển Sinh Viên làm Việc ngoài giờ, hãy chọn.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{url('findjob/index')}}">Sinh Viên Tìm Việc</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
