@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                @foreach ($datas as $val)
                    <div class="panel-heading" style="background:#328f31;color:#fff;font-weight:bold;">eICTuLearningManageSystem Update - Cập nhật môn học {{ $val->name }} cho sinh viên {{$st->name}}</div>
                    <div class="panel-body">
                        <p>Thông tin môn học:</p>
                            <ul>
                        
                                <li>
                                    <label class="lab-update">Tên môn học: {{ $val->name }}</label>
                                </li>
                                <li>
                                    <label class="lab-update">Học kỳ dự kiến: HK{{ $val->term }}</label>
                                </li>
                                <li>
                                    <label class="lab-update">Số tín chỉ: {{ $val->credit }}</label>
                                </li>
                                <li>
                                    <label class="lab-update">Số tiền học phí: {{  number_format($val->credit*240000) }}đ</label>
                                </li>
                            </ul>
                        <p>Tiến độ học tập thực tế:</p>
                        <span class="facttime" ><b>Thời gian học thực tế (Học kỳ):</b></span>
                        <form action="{{ url("update/$val->id")}}" method="post" class="form-horizontal">
                        <input type="text" name="term" class="box-hocky">
                        <br/><br/>
                        <input type="submit" name="update" class="submit-update" value="Cập nhật">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection