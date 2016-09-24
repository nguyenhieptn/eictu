@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuLearningManageSystem</div>
                    <div class="panel-body">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học phần</th>
                                    <th>Số tín chỉ</th>
                                    <th>Học kỳ</th>
                                    <th>Học phí</th>
                                    <th>Đã học</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @forelse ($datas as $val)
                                    <tr>
                                        <td>{{ $val->id }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->credit }}</td>
                                        <td>{{ $val->term }}</td>
                                        <td>{{ $val->credit*240000 }}</td>
                                        <td>@if ($val->situation==0)
                                            <a href="{{route('LMS.lmsupdate', $val->id )}}">Update</a>
                                            @else
                                            {{ $val->situation }}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <p>No </p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection