@extends('/layouts/app')
@section('content')

    <div class="row">
        <br><br><br><br><br><br><br><br>
        <div class="col-lg-8 col-lg-offset-2">
            <?php
            if (isset($data)) {
                echo $data;
            }

            ?>

        </div>

    </div>


@stop
