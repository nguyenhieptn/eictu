@extends('layouts.school_app')
@section('title')
    <span>Them sinh vien</span>
@endsection
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Hãy nhập đầy đủ thông tin cho sinh viên mới trúng tuyển vào mẫu sau:</div>
                    <div class="panel-body">
                        <form action="{{ url("students")}}" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="Major_Id">Mã ngành :</label>
                                <div class="col-md-9">
                                    <select class="form-control col-sm-9" id="Major_Id" name="Major_Id">
                                        @forelse($majors as $major)
                                            <option value="{{$major-> id}}">{{$major-> code}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="Code" >Mã sinh viên :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="Code" name="Code" placeholder="Mã sinh viên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="Name">Họ và tên :</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Họ và tên">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3" for="gender">Giới tính :</label>
                               <div class="col-sm-9">
                                    <select class="form-control col-sm-9" id="gender" name="gender">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                               </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="birthday">Ngày sinh :</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="birthday" name="birthday" >
                                </div>
                            </div>


                            <div class="form-group" style="text-align: center;">
                                <button type="submit" class="btn btn-default">Thêm mới</button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




@endsection