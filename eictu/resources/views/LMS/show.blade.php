@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuLearningManageSystem</div>
                    <div class="panel-body">
                        
                        <table class="table">
                            <tr>
                                <th>STT</th>
                                <th>Tên học phần</th>
                                <th>Số tín chỉ</th>
                                <th>Học kỳ</th>
                                <th>Học phí</th>
                                <th>Đã học</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Toán cao cấp 1</td>
                                <td>4</td>
                                <td>1</td>
                                <td>800.000đ</td>
                                <td>HK1</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection