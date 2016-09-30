@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"
                         style="color:white;font-weight: bold;font-size:24px;background:#3bc037;height:50px;width:100%;padding: 10px">
                        eICTuMajorList - Ngành học
                    </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @if (!isset($_majors) || $_majors ==null)
                                ...<br>
                            @else
                                @foreach ($_majors as $_l)
                                    <li class="list-group-item">
                                        <a href="{{url("indexmajor/subjects/{$_l->id}")}}">
                                            {{ $_l->name}}
                                        </a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
