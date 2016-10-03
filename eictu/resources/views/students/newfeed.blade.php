@extends('layouts.student_app')

@section('title')
    - Trang chủ của sinh viên
@endsection
@section('content')
    <?php
     $newsfeeds = \App\NewsFeed::orderBy('time', 'DESC')->paginate(30);
    ?>
    <div class="panel panel-default find-job">
        <div class="panel-heading">Bảng tin </div>
        <div class="panel-body panel-body-2" id="content-js">



            @foreach($newsfeeds as $item)
                <?php
                $data1 = \App\Student::select('*')
                        ->where('id','=',$item->student_id)
                        ->first();
                $student_name=  $data1!=null? $data1->name : "Người nào đó";

                $student_avatar= $data1!= null ? $data1->avatar==null ? "/img/avatar.jpg" : $data1->avatar."" : "/img/avatar.jpg";
                ?>
                <div class='media'>
                    <a href='' class='media-left' href='#'><img class='media-object'  class="img-rounded" src="{{url($student_avatar)}}" alt=''></a>
                    <div class='media-body'>
                        <p class="pull-right date-post">
                            <?php
                            if(date('d-m-Y',strtotime($item->time)) == date("d-m-Y")){
                                echo "Hôm nay";
                            }elseif(date('d-m-Y',strtotime($item->time)) ==(date("d-m-Y")-1)){
                                echo "Hôm qua";
                            }else{
                                echo date('d-m-Y',strtotime($item->time));
                            }
                            ?>

                        </p>
                        <h4 class='media-heading'>
                            <strong>
                               <?php
                                $id=auth()->user()->code;
                                $code='';
                                echo "<h3><a href='friendroom?id=$id&friend=$code'>$student_name</a></h3>";  ?>
                            </strong>
                        </h4>
                        <p class="index-content"><?php echo substr($item->content, 0,250) ?> ...</p></div>
                </div>

            @endforeach
            <div class="pull-right">{{$newsfeeds->render()}}</div>
        </div>

    </div>
@endsection
