@extends('layouts.student_app')

@section('title')
    - Trang chủ của sinh viên
@endsection


@section('content')
    <?php
     $newsfeeds = \App\NewsFeed::orderBy('time', 'DESC')->paginate(20);
    ?>
    @forelse ( $newsfeeds as $newsfeed)
        <div class="row">
            <?php
            $data1 = \App\Student::select('*')
                    ->where('id','=',$newsfeed->student_id)
                    ->get()->first();
            $student_name=  $data1!=null? $data1->name : "Người nào đó";
            $student_avatar=  $data1!=null? $data1->avatar : "/img/avatar.jpg";
            ?>
            <div class="col-md-2">
                <img src="{{$student_avatar}}" width="150" height="150">
            </div>
            <div class="col-md-10" style="padding:20px;">
                <strong>{{$student_name}}</strong>
                <p style="word-wrap:break-word;">{{$newsfeed->content}}</p>
            </div>
        </div>
    @empty
        <p>Không có bảng tin nào</p>
    @endforelse

@endsection