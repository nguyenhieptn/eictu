@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuStudentJobInput - Đăng tin tìm việc</div>
                    <div class="panel-body">
                        <p>Sinh viên tìm việc đăng tin bằng cách nêu đầy đủ khả năng và yêu cầu vào mẫu sau:</p>
                        @if(count($errors)>0)
                              <div class="alert alert-danger">
                                  {{ $errors->first('content') }}
                              </div>
                        @endif
                        <form action="{{route('findjob.post.add')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Nguyện vọng:</label>
                                <textarea class="form-control" cols="30" rows="5" name="content"> </textarea>
                            </div>
                            <button type="submit" class="btn btn-default"> Đăng Tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection