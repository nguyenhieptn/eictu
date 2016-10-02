@extends('layouts.student_app')
@section('content')
    <div class="panel panel-default find-job">
        <div class="panel-heading">Trang tin tìm việc làm của Sinh viên </div>
        <div class="panel-body">
           @if(Auth::check() && Auth::user()->type ==3)
            <form action="{{route('findjob.post.add')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea class="form-control ta-post" rows="2" name="content" id="content"> </textarea>
                    <span style="font-size:13px;color:#899090;font-style: italic;">Bạn nên nói rõ những việc bạn có thể làm, chất lượng, trình độ cũng như mức lương đòi hỏi …</span>
                    <button type="submit" class="btn btn-success pull-right btn-post"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Đăng Tin</button>
                </div>
            </form>
            @endif
        </div>
        <div class="panel-body panel-body-2" id="content-js">
        @foreach($datas as $data=>$item)
           <div class='media'>
             <a href='' class='media-left' href='#'><img class='media-object'  class="img-rounded" src="<?php echo ($item->avatar== null) ? "/img/user-image01.png" : $item->avatar ?>" alt=''></a>
             <div class='media-body'> 
               <p class="pull-right date-post">
                 <?php 
                 if(date('d-m-Y',strtotime($item->created_at)) == date("d-m-Y")){
                    echo "Hôm nay";
                 }elseif(date('d-m-Y',strtotime($item->created_at)) ==(date("d-m-Y")-1)){
                    echo "Hôm qua";
                 }else{
                  
                    echo date('d-m-Y',strtotime($item->created_at));
                 }
                ?>
             </p>
             <h4 class='media-heading'><strong><a href="{{route('findjob.detail',$item->sid)}}">{{$item->name}}</a></strong></h4>
             <p class="index-content"><?php echo substr($item->content, 0,150) ?> ...</p></div>
             </div>
          @endforeach
           <div class="pull-right">{{$datas->render()}}</div> 
        </div>

    </div>
@endsection
