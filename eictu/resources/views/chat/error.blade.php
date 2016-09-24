@extends('/layouts/app')
@section('content')

    <div class="row">
        <br><br><br><br><br><br><br><br>
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h4>Bạn không có quyền hạn để truy cập vào đường dẫn này. Xin mời logout và đăng nhập lại
                <a style="float:right;" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            </h4>

        </div>

    </div>


@stop
