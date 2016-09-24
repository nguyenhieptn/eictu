@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="color:white;font-weight: bold;font-size:18px;background:#3bc037;height:50px;width:100%;padding: 10px">
                        eICTuMajorEducationProgramAdd - Khai báo Môn học mới cho ngành
                    </div>
                    <div class="panel-body">
                        <form action="{{ url("major/createsubject/data/{$id}")}}" method="post"
                              class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="code">Mã Môn:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code"
                                           placeholder="Enter code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Tên Môn:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="term">Học Kỳ Dự Kiến:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="term" name="term"
                                           placeholder="Enter Semester expected">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="credit">Tín Chỉ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="credit" name="credit"
                                           placeholder="Number of Unit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="note">Ghi Chú:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="note" name="note"
                                           placeholder="Note">
                                </div>
                            </div>
                            <div class="form-group">
                                {{--<label class="control-label col-sm-2" for="major_id">ID:</label>--}}
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" id="major_id" name="major_id"
                                           placeholder="ID" value="{{$id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
@endsection
