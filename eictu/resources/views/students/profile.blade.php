@extends('layouts.student_app')

@section('title')
    - Hồ sơ sinh viên
@endsection


@section('content')

    <form action="{{ url("profile")}}" method="post" class="form-horizontal">
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
                <input type="date" class="form-control" id="birthday" name="birthday" value="1994-12-20" >
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3" for="birthday">Avatar :</label>
            <div class="col-md-9">
                <img id="blah" src="#" alt="your image" width="200" height="200"/>
                <input type="file" class="form-control" id="image" name="image" >
            </div>
        </div>


        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-default">Thêm mới</button>
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