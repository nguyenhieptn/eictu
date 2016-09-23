@extends('teacher.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Thêm giáo viên</div>
                    <div class="panel-body">
                        <form action="{!! route('teacher.add') !!}" role="form" method="post" class="form-horizontal">
                             <div class="form-group {{$errors->has('major')? ' has-error': ''}}">
                                <label class="control-label col-sm-2" for="major">Ngành</label>
                                <div class="col-sm-10">
                                   <select class="form-control" id="major" name="major">
                                    <option value="">Chọn ngành</option>
                                    @foreach($major as $item_major)
                                        <option value="{!! $item_major['id'] !!}">{!! $item_major['name'] !!}</option>
                                    @endforeach
                                </select>
                                </div>
                                
                            </div>
                            <div class="form-group {{$errors->has('code')? ' has-error': ''}}">
                                <label class="control-label col-sm-2" for="code">Mã giáo viên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Ma giao vien">
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('name')? ' has-error': ''}}">
                                <label class="control-label col-sm-2" for="name">Tên giáo viên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ten giao vien">
                                </div>
                            </div>

                           
                            <div class="form-group {{$errors->has('gender')? ' has-error': ''}}">
                                <label class="control-label col-sm-2" for="birthday">Giới tính</label>
                                <div class="col-sm-10 " >
                                    <select name="gender" multiple class="form-control">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group {{$errors->has('birthday')? ' has-error': ''}}">
                                <label class="control-label col-sm-2" for="birthday">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control"  name="birthday" >
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
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