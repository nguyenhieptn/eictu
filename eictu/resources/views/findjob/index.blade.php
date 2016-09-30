@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('js/findJob.js')}}"></script>
@section('content')
    <div class="container find-job">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Trang tin tìm việc làm của Sinh viên </div>
                    <div class="panel-body">
                       @if(Auth::check() && Auth::user()->type ==3)
                        <form action="" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                               <p class="success"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="text-success"></span> </p>
                               <p class="errors"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="text-danger"></span> </p>
                                <textarea class="form-control ta-post" cols="30" rows="3" name="content" id="content"> </textarea>
                                <span style="font-size:13px;color:#899090;font-style: italic;">Bạn nên nói rõ những việc bạn có thể làm, chất lượng, trình độ cũng như mức lương đòi hỏi …</span>
                                <button type="submit" class="btn btn-success pull-right btn-post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Đăng Tin</button>
                            </div>
                        </form>
                        @endif
                    </div>
                    <div class="panel-body panel-body-2" id="content-js"></div>
                     <div class="ajax-loading"><center id ="end"><img src="{{ asset('img/loader_medium.gif') }}" /></center></div>
                </div>
            </div>
        </div>
    </div>
@endsection
