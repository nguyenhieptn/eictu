@extends('/layouts.student_app')
@section('content')



    <div class="row">

        <div class="col-xs-12" id="colors">
            <h4>Tìm bạn để Chat</h4>
        </div>
        <br><br><br><br><br>
        <form action="{{ url("chat/friend")}}" method="post">
            <div class="col-xs-7 col-xs-offset-1">
                <input class="form-control input-lg" name="message" type="text"
                       placeholder="Nhập Mã Sinh Viên cần Chat" >

            </div>

            <div class="col-xs-3">
                <button type="submit" class="btn btn-primary btn-lg">Tìm Kiếm</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        </form>

        <div class="col-xs-10 col-xs-offset-1">

            <br>
            <?php

            if (isset($data)) {
                echo " <p class='lead'>Kết quả tìm  : </p>";
                $student = DB::table('students')->where('code', $data['id_search'])->first();
                if ($student == null) {
                    echo "<h4>Không tìm thấy sinh viên nào như yêu cầu</h4>";
                } else {
                    $name = $student->name;
                    $code = $student->code;
                    $id = $data["user_id"];
                    echo "<h3><a href='friendroom?id=$id&friend=$code'>$name</a></h3>";
                }

            }
            ?>
        </div>


    </div>
@stop