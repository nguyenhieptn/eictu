@extends('/layouts/app')
@section('content')

    <div class="row">
        <br><br><br><br><br><br><br><br>
        <div class="col-lg-8 col-lg-offset-2">
            <form action="{{ url("chat_guest/guest")}}" method="post">
                <div class="col-xs-5 col-xs-offset-3">
                    <input class="form-control input-lg" name="name" type="text"
                           placeholder="Nhập Mã Sinh Viên cần Chat" >

                </div>

                <div class="col-xs-1">
                    <button type="submit" class="btn btn-primary btn-lg">Tìm Kiếm</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            </form>

        </div>

    </div>


@stop
