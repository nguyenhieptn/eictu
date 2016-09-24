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
                                    <label class="lab-update">Số tiết học: {{ $val->credit*15 }}</label>
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
                        

                        <select name="term">
                            <option value="1">HK1</option>
                            <option value="2">HK2</option>
                            <option value="3">HK3</option>
                            <option value="4">HK4</option>
                            <option value="5">HK5</option>
                            <option value="6">HK6</option>
                            <option value="7">HK7</option>
                            <option value="8">HK8</option>
                            <option value="9">HK9</option>
                            <option value="10">HK10</option>
                        </select>
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
