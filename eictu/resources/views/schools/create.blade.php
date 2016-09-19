@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">School</div>
                    <div class="panel-body">
                        <form action="{{ url("schools")}}" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="code">Code:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="code" name="code" placeholder="Ma truong">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Ten Truong:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ten truong">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user_id">Manager:</label>
                                <select class="form-control col-sm-10" id="user_id" name="user_id">
                                    <option value="1">Admin</option>
                                    <option value="2">XXYZ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection