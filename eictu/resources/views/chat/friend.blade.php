@extends('/layouts/app')
@section('content')

    <div class="row">

        <div class="col-lg-6 col-lg-offset-2" id="purple">
            <h4>eICTuChatFriend - Tìm bạn để Chat</h4>
        </div>

        <div class="col-lg-10 col-lg-offset-2">
            <p class="lead">Tìm bạn để CHAT</p>
        </div>

        <div class="col-lg-1 col-lg-offset-3">
            <h4>Mã Sinh Viên: </h4>
        </div>

        <form action="{{ url("chat/friend")}}" method="post">
            <div class="col-lg-3">
                <input class="form-control input-lg" id="inputlg" name="message" type="text"
                       placeholder="Nhập mã sinh viên cần CHAT"  onclick="myFunction()">

            </div>

            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary btn-lg">Tìm Kiếm</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>

        <div class="col-lg-10 col-lg-offset-2">
            <p class="lead">Kết quả tìm kiếm</p>
            <a href="friendroom.blade.php" >Cai gi the</a>
        </div>

        <?php
                if (isset($id_search)){
                echo  $id_search;
                }
            ?>
    </div>
@stop