@extends('layouts.app')
@section('title')
eICTuLearningManageSystem - Quản lý việc học cho sinh viên {{$st->name}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
<<<<<<< HEAD
                    <div class="panel-heading" style="background:#328f31;color:#fff;font-weight:bold;">eICTuLearningManageSystem - Quản lý việc học cho sinh viên {{$st->name}}</div>
                    <div class="panel-body">
                    <p>{{ $row2 }}/{{$row1 }} môn đã học tương đương với {{$row2*100/$row1}}% số môn</p>
=======
                    
                    <div class="panel-body">
                    <p>{{ $row2 }}/{{$row1 }} môn đã học tương đương với {{round($row2*100/$row1,2)}}% số môn</p>
>>>>>>> 68048f6ecdef3a7b84457fd9911ca779b11760b6
                    <p>{{ number_format($sth2) }}/{{number_format($sth1) }} tiết đã học tương đương với {{round($sth2*100/$sth1,2)}}% số tiết</p>
                    <p>{{ number_format($sum2) }}đ/{{number_format($sum1) }}đ học phí đã đóng tương đương với {{round($sum2*100/$sum1,2)}}% học phí</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên học phần</th>
                                    <th>Thời gian học dự kiến</th>
                                    <th>Số tiết học</th>
                                    <th>Số tín chỉ</th>
                                    <th>Học phí</th>
                                    <th>Đã học</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @forelse ($datas as $val)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $val->name }}</td>
                                        <td>HK{{ $val->term }}</td>
                                        <td>{{ $val->credit*15 }}</td>
                                        <td>{{ $val->credit }}</td>
                                        <td>{{ number_format($val->credit*240000) }}đ</td>
                                        <td>@if ($val->situation==0)
                                            <a href="{{route('LMS.lmsupdate', $val->id )}}">Update</a>
                                            @else
                                            HK{{ $val->situation }}
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
