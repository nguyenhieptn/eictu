@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuLearningManageSystem Update</div>
                    <div class="panel-body">
                        <p>Thông tin môn học:</p>
                            <ul>
                                <li>
                                    <label class="lab-update">Tên môn học: </label>
                                </li>
                                <li>
                                    <label class="lab-update">Học kỳ dự kiến: </label>
                                </li>
                                <li>
                                    <label class="lab-update">Số tiết học: </label>
                                </li>
                                <li>
                                    <label class="lab-update">Số tín chỉ: </label>
                                </li>
                                <li>
                                    <label class="lab-update">Số tiền học phí: </label>
                                </li>
                            </ul>
                        <p>Tiến độ học tập thực tế:</p>
                        <span class="facttime" ><b>Thời gian học thực tế (Học kỳ):</b></span>
                        <input type="text" name="hocky" class="box-hocky">
                        <br/><br/>
                        <input type="submit" name="update" class="submit-update" value="Cập nhật">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection