@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/eICTuHomePage.css')!!}">
                    <div class="trangchu" >eICTuSchoolHomePage- Trường Học</div>

                    <div class="body">
                        Đây là trang chủ của quản trị trường học.
                        <br/>
                        <br/>
                        Để quản trị ngành học, chọn mục.
                        <br/>
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{ url('schools/eICTuMajorList') }}">Ngành Học</a>
                        <br />
                        <br/>
                        Để quản trị lớp học, chọn mục.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{ url('schools/eICTuClassList') }}">Lớp Học</a>
                        <br />
                        <br/>
                        Để quản trị sinh viên, chọn mục.
                        <br />
                        <img class="image" src="{{url('quanlytruong/images/li.png')}}"> <a class="link" href="{{ url('schools/create') }}">Sinh Viên</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection