@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
                    <div class="thanhvien">eICTuMajorRegister - Ngành Học    <a style=" padding-left:650px;font-size: 18px; color: #FFFFFF;" href="{{ url('/logout') }}"
                                                                                onclick="event.preventDefault();
                                                                                       document.getElementById('logout-form').submit();">
                                                                                Logout
                                                                            </a>
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('schools/eICTuMajorRegister') }}">THÊM NGÀNH MỚI</a>
                        <br/>
                        <br/>
                        Danh Mục Ngành Học:
<table class="table">

            <tr>
                    <td>STT</td>
                      <td>Mã Ngành</td>
                <td>Tên Ngành</td>

            </tr>
                        @if (!isset($_majors) || $_majors ==null)
                            <tr>Chưa Ngành Nào</tr>
                        @else
                            @foreach ($_majors as $_l)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $_l->code}} </td>
                                <a href="">

                                   <td>
                                       <a href="{{url("major/subjects/{$_l->id}")}}">
                                       {{ $_l->name}}</a></td>

                                </a>

            </tr>

                            @endforeach
                        @endif
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection