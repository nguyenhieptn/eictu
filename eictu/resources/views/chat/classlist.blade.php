@extends('/layouts/app')
@section('content')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h4>eICTuChatClassList - Các nhóm chat theo lớp học
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

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p class="lead"> Danh mục nhóm chat lớp học :</p>
            <ol>
            <?php
            $classes = DB::table('classes')->get();
            foreach ($classes as $class) {
                $class_name = $class->name;

                echo "<li><a href='classroom?c=$class_name&id=$user_id'>$class_name</a></li>";
            }
            ?>
            </ol>

        </div>
    </div>
@stop
