@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">School</div>
                    <div class="panel-body">
                        <a href="{{ url('schools/eICTuMajorRegister') }}">Tao Nganh Moi</a>
<table class="table">


                        @if (!isset($_majors) || $_majors ==null)
                            <tr>Chưa có lớp</tr>
                        @else
                            @foreach ($_majors as $_l)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $_l->code}} </td>
                                <a href="">

                                   <td> {{ $_l->name}}</td>

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