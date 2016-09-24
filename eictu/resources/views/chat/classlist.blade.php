@extends('/layouts/app')
@section('content')

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h4>eICTuChatClassList - Các nhóm chat theo lớp học</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" >
            <p class="lead"> Danh mục nhóm chat lớp học :</p>
            <ol>
                <li> <a href="classroom?c=CNTT_K11A&id=DTC125D4802010198" class="link">CNTT_K11A</a></li>
                <li> <a href="classroom?c=CNTT_K11B&id=DTC125D4802010198" class="link">CNTT_K11B</a></li>
                <li> <a href="classroom?c=CNTT_K11C&id=DTC125D4802010198" class="link">CNTT_K11C</a></li>
            </ol>
        </div>
    </div>
@stop
