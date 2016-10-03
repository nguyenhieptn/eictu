@extends('/layouts/app')

@section('title')
    <span>Trang chủ của sinh viên</span>
@endsection
@section('content')
<body>
<div class="wrapper">
    <div class="pagewrapper">
        <div class="top">
            <span>Trang chủ của sinh viên</span>
        </div>
        <div style="text-align: center">
        <div class="content1">
            <div class="row">
                <div class="col-md-4">
                    <table>
                        <tr>
                            <td ><img src="{{ url($avatar)}}" id="topimg"/></td>
                            <td id="toptext">{{$name}}</td>
                        </tr>

                        @if(count($classid)>0 && $classid !=null)
                            <tr>
                                <td><img src="{{url('img/Gift-128.png')}}"/></td>
                                <td>
                                    <a href="{{route('classes.classmatersbirthday', $classid )}}">Sinh nhật bạn cùng lớp</a>
                                </td>
                            </tr>
                        @endif

                        <tr>
                            <td><img src="{{url('img/Information.png')}}"/></td>
                            <td><a href="{{route('iwant.status')}}">Tôi muốn <span>- I Want </span></a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/i_information_more_find_out_info-128.png')}}"/></td>
                            <td><a href="{{url('/iHave')}}">Chợ đồ cũ</a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/Candidate_Search-128.png')}}"/></td>
                            <td><a href="{{url('findjob/index')}}">Tìm việc làm </a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/go-home-128.png')}}"/></td>
                            <td><a href="{!! url('dormitory/search')!!}">Kí túc xá</a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/go-home.png')}}"/></td>
                            <td><a href="{{url('/rentHouse')}}">Nhà trọ sinh viên</a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/Chat-2-128.png')}}"/></td>
                            <td><a href="{{url('chat/classrooms')}}">Messages / CHAT</a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/search.png')}}"/></td>
                            <td><a href="{{url('LMS/show')}}">Tiến độ học tập LMS</a></td>
                        </tr>
                        <tr>
                            <td><img src="{{url('img/frmPhanQuyen.png')}}"/></td>
                            <td><a href="#">Hồ sơ</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <h1>This is my conten pages</h1>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
    @endsection
<!-- Scripts --><script src="{{ url("/js/app.js") }}"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
