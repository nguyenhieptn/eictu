@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm giảng viên</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('teacher.add') }}">
                        <input type="hidden" name="_token" value="{{Session::token()}}">

                        <div class="form-group">
                            <label for="major" class="col-md-4 control-label">Ngành Học</label>

                            <div class="col-md-6">
                                <select name="major" class="form-control">
                                    <option value="">Chọn ngành dạy</option>
                                    @if(!$major)

                                    @else
                                        @foreach($major as $item_major)
                                            <option value="{!! $item_major['id'] !!}">{!! $item_major['name'] !!}</option>

                                        @endforeach
                                    @endif    
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Mã Giảng Viên</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Tên Giảng Viên</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Giới tính</label>

                            <div class="col-md-6">
                                <input type="radio" name="gender[]" value="0" placeholder="">Nam
                                <input type="radio" name="gender[]" value="1" placeholder="">Nu

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Ngày sinh</label>

                            <div class="col-md-6">
                                <input type="date" name="birtday" class="form-control">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
