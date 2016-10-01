@extends('layouts.student_app')

@section('title')
    - Hồ sơ sinh viên
@endsection


@section('content')

    <form action="{{ url("profile")}}" method="post" class="form-horizontal" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="row">
            <h2><strong>Thông tin cá nhân :</strong></h2>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3" for="Major_Id">Mã ngành :</label>
            <div class="col-md-9">
                <select class="form-control col-sm-9" id="Major_Id" name="Major_Id">
                    @forelse($majors as $major)
                        @if($data->major_id == $major->id)
                        <option value="{{$major-> id}}" selected>{{$major-> code}}</option>
                        @else
                            <option value="{{$major-> id}}" >{{$major-> code}}</option>
                        @endif
                    @empty

                    @endforelse
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3" for="Code" >Mã sinh viên :</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="Code" name="Code" placeholder="Mã sinh viên" value="{{$data->code}}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3" for="Name">Họ và tên :</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Họ và tên"  value="{{$data->name}}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="gender">Giới tính :</label>
            <div class="col-sm-9">
                <select class="form-control col-sm-9" id="gender" name="gender">
                    @if($data->gender==1)
                    <option value="1" selected>Nam</option>
                    <option value="0">Nữ</option>
                    @else
                        <option value="1" >Nam</option>
                        <option value="0" selected>Nữ</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3" for="birthday">Ngày sinh :</label>
            <div class="col-md-9">
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$data->birthday}}" >
            </div>
        </div>

        <div class="row">
            <h2><strong>Thay đổi hình đại diện (avatar):</strong></h2>
        </div>
        <div class="form-group">
            <div class="col-md-3" > <img id="blah" src="{{$data->avatar}}" alt="your image" width="200" height="200" /></div>
            <div class="col-md-9" style="padding-top: 50px;">
                <input type="file" class="form-control" name="image" value="" placeholder="">
            </div>
        </div>


        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-default">Cập nhật</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </div>
    </form>

@endsection

@section('script')
    <script>
        function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

        reader.readAsDataURL(input.files[0]);
        }
        }

        $("#image").change(function(){
        readURL(this);
        });

        document.getElementById("myDate").defaultValue = "2014-02-09";
    </script>
@endsection