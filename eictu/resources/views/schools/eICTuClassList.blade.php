@extends('layouts.app')

@section('title')
    Lớp Học
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <link rel="stylesheet" type="text/css" href="{!! url('quanlytruong/css/trangthanhvien.css')!!}">
                    <div class="thanhvien">eICTuClassList - Lớp Học
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('schools/eICTuClassRegister') }}">Thêm Lớp Học Mới</a>
                        <br/>
                        <br/>
                        Danh Mục Lớp Học
                        <table class="table">
                            <tr>
                               <td>STT</td>
                                <td>Tên Lớp</td>
                            </tr>

                            @if (!isset($_classes) || $_classes ==null)
                                <tr>Chưa có lớp</tr>
                            @else
                                @foreach ($_classes as $_l)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <a href="">

                                            <td> <a href="{{route('classes.studentlist', $_l->id )}}">

                                                    {{ $_l->name}}
                                                </a></td>

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