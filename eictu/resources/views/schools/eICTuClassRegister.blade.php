@extends('layouts.school_app')

@section('title')
    Khai Báo Lớp Học
@endsection
@section('content')
    <div >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Hãy Nhập đủ thông tin cho lớp học mới vào mẫu sau:
                        <form action="{{ url("schools/dangkylop")}}" method="post" class="form-horizontal">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Tên Lớp Học:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên Lớp">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="codee">Mã Ngành:</label>
                                <div class="col-sm-10">
                                    <select name="manganh" id="">
                                        @if (!isset($_majors) || $_majors ==null)

                                        @else
                                            @foreach ($_majors as $_l)
                                                <option value="{{ $_l->id}}">

                                                    {{ $_l->code}}

                                                </option>

                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Thêm Mới</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection