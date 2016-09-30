@extends('layouts.school_app')

@section('title')
    Ngành Học
@endsection
@section('content')
    <div >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a class="btn btn-info" href="{{ url('schools/eICTuMajorRegister') }}">THÊM NGÀNH MỚI</a>
                        <br/>
                        <br/>
                        Danh Mục Ngành Học:
<table class="table">

            <tr>
                    <th>STT</th>
                      <th>Mã Ngành</th>
                <th>Tên Ngành</th>

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