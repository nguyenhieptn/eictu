@extends('layouts.school_app')

@section('title')
    Lớp Học
@endsection
@section('content')
    <div >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <a class="btn btn-info" href="{{ url('schools/eICTuClassRegister') }}">Thêm Lớp Học Mới</a>
                        <br/>
                        <br/>
                        Danh Mục Lớp Học
                        <table class="table">
                            <tr>
                               <th>STT</th>
                                <th>Tên Lớp</th>
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