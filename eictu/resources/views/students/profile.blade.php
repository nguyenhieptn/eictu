@extends('layouts.student_app')

@section('title')
    - Hồ sơ sinh viên
@endsection


@section('content')

            <form action="{{ url("students")}}" method="post" class="form-control">

                <div class="row">
                    <div class="col-md-offset-1 col-md-11">
                        <h2>Thông tin cá nhân</h2>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="Code" >Mã ngành :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="Code" name="Code" placeholder="Mã sinh viên">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

@endsection