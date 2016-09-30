@extends('layouts.student_app')
@section('content')
    <div class="panel panel-default find-job">
        <div class="panel-heading">Trang tin tìm việc làm của Sinh viên </div>
        <div class="panel-body">
           @if(Auth::check() && Auth::user()->type ==3)
            <form action="{{route('findjob.post.add')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <!-- <p class="errors"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <span class="text-danger"></span> </p> -->
                    <textarea class="form-control ta-post" cols="30" rows="3" name="content" id="content"> </textarea>
                    <span style="font-size:13px;color:#899090;font-style: italic;">Bạn nên nói rõ những việc bạn có thể làm, chất lượng, trình độ cũng như mức lương đòi hỏi …</span>
                    <button type="submit" class="btn btn-success pull-right btn-post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Đăng Tin</button>
                </div>
            </form>
            @endif
        </div>
        <div class="panel-body panel-body-2" id="content-js">
        @foreach($datas as $data=>$item)
           <div class='media'>
             <a href='' class='media-left' href='#'><img class='media-object' src="<?php echo ($item->avatar== null) ? "/img/user-image01.png" : $data1->avatar ?>" alt=''></a>
             <div class='media-body'> 
             <h4 class='media-heading'>{{$item->name}}"</h4>
             <p>{{$item->content}}</p></div>
             </div>
          @endforeach
        </div>
    </div>
@endsection
