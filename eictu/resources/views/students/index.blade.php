@extends('layouts.school_app')

@section('content')
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
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Lớp</th>
                                <th>Mã sinh viên</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ( $data as $student)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td>{{ $student->name }}</td>
                                    <td><?php
                                        $data1 = \App\Classes::select('*')
                                                ->where('id','=',$student->class_id)
                                                ->get()->first();
                                        echo  $data1!=null? $data1->name : "";
                                        ?>
                                    </td>
                                    <td>{{ $student->code }}</td>
                                </tr>
                            @empty
                                <p>Không có sinh viên nào</p>
                            @endforelse

                            </tbody>
                        </table>
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection