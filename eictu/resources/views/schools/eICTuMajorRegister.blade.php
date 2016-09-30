@extends('layouts.school_app')

@section('title')
    Khai Báo Ngành Học Mới
@endsection
@section('content')
    <div >
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div >


                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="panel-body">
                        Hãy nhập đủ thông tin cho ngành học mới vào mẫu sau:
                        <br/>
                        <br/>
                        <form action="{{ url("schools/dangkynganh")}}" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="codee">Mã Ngành:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Mã Ngành">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Tên Ngành:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên Ngành">
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