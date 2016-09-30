@extends('layouts.school2_app')

@section('title')
    <span>Đây là hệ sinh thái dành cho các trường đại học</span>
@endsection
@section('content')
    <div >
        <div class="row">
            <div  class="col-md-9">
                <div >
                    <div >
                        <?php
                        $_majors =  DB::table('schools')
                                ->select('name')
                                ->orderBy('id', 'asc')
                                ->get();
                        ?>
                        <table  style="text-align: left">

                            @if (!isset($_majors) || $_majors ==null)
                                <tr>Chưa Ngành Nào</tr>
                            @else
                                <div>
                                    <ul class="list-group">
                                @foreach ($_majors as $_l)


                                                <li class="list-group-item" style="list-style: none; font-size: 23px;"> <img class="image" src="{{url('quanlytruong/images/go-home-128.png')}}"> {{ $_l->name}}</li>


                                @endforeach

                                            </ul>
                                        </div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection