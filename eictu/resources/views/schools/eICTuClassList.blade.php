@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">eICTuClassList - Lớp Học </div>
                    <div class="panel-body">
                        <a href="{{ url('schools/eICTuClassRegister') }}">Tao Lop Moi</a>
                        <table class="table">


                            @if (!isset($_classes) || $_classes ==null)
                                <tr>Chưa có lớp</tr>
                            @else
                                @foreach ($_classes as $_l)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <a href="">

                                            <td> <a href="{{route('classes.studentlist', $_l->id )}}">

                                                    {{ $_l->name}}
                                                </a></td>

                                        </a>

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