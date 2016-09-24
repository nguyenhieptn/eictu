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
                       placeholder="Nhập mã sinh viên cần CHAT" onclick="myFunction()">

            </div>

            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary btn-lg">Tìm Kiếm</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </form>

        <div class="col-lg-10 col-lg-offset-2">
            <p class="lead">Kết quả tìm kiếm</p>
            <br>
            <?php

            if (isset($data)) {
                $student = DB::table('students')->where('code', $data['id_search'])->first();
                if ($student == null) {
                    echo "<h4>Không tìm thấy sinh viên nào như yêu cầu</h4>";
                } else {
                    $name = $student->name;
                    $code = $student->code;
                    $id = $data["user_id"];
                    echo "<a href='friendroom?id=$id&friend=$code'>$name</a>";
                }

            }
            ?>
            <a href="friendroom?id=DTC125D4802010198&friend=DTC125D4802010196" class="link"></a>
        </div>


    </div>
@stop