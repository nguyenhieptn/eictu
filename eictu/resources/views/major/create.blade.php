@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                        <div class="panel-heading" style="color:white;font-weight: bold;font-size:24px;background:#3bc037;height:100%;width:100%;">
                            eICTuMajorRegister - Khai báo Ngành học mới
                        </div>
                    <div class="panel-body">
                        <form action="{{ url("major/data/")}}" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Tên Ngành:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="code">Mã Ngành:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code"
                                           placeholder="Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">
                                        Submit
                                    </button>
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
