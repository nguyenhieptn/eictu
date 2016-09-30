@extends('layouts.school2_app')

@section('title')
    <span>Đây là hệ sinh thái dành cho các trường đại học</span>
@endsection
@section('content')
    <div >
        <div class="row">
            <div style="padding-left: 235px;" class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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
                                @foreach ($_majors as $_l)
                                    <tr>
                                        <td> <img class="image" style=" width: 30px;  height: 30px;  float: left;margin: 20px;"  src="{{url('img/go-home.png')}}"></td>
                                        <td><h3>{{ $_l->name}}</h3> </td>


                                    </tr>

                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection