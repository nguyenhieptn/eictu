@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Sinh viên toàn trường</div>
                    <div class="panel-body">
                        <a href="{{ url('student/create') }}">THÊM SINH VIÊN VÀO TRƯỜNG</a>

                        <h2>Danh sách sinh viên toàn trường</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Lớp</th>
                                <th>Mã sinh viên</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ( $data as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->class_id }}</td>
                                    <td>{{ $student->code }}</td>
                                </tr>
                            @empty
                                <p>Không có sinh viên nào</p>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection