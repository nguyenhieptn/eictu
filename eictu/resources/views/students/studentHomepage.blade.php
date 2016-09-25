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
             <table>
                <tr>
                    <td ><img src="{{ url('img/user-image01.png')}}" id="topimg"/></td>
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
                    <td><a href="{{url('/iHave')}}">Tôi có <span>- I Have </span></a></td>
                </tr>
                <tr>
                    <td><img src="{{url('img/Candidate_Search-128.png')}}"/></td>
                    <td><a href="{{url('findjob/index')}}">Tôi tìm việc <span>- I Am Finding a Part-time Job </span></a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/go-home-128.png')}}"/></td>
                    <td><a href="{!! url('dormitory/search')!!}">Nơi ở của bạn trong kí túc xá</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/go-home.png')}}"/></td>
                    <td><a href="{{url('/rentHouse')}}">Bạn tôi thuê nhà ở đâu</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/Chat-2-128.png')}}"/></td>
                    <td><a href="{{url('chat/classrooms')}}">Chát với cả lớp</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/chat-128.png')}}"/></td>
                    <td><a href="{{url('chat/friend')}}">Chát với bạn</a></td>
                </tr>
                <tr>
                <td><img src="{{url('img/search.png')}}"/></td>
                <td><a href="{{url('LMS/show')}}">LMS</a></td>
            </tr>
            </table>
        </div>
        </div>
    </div>
</div>
    @endsection
<!-- Scripts --><script src="{{ url("/js/app.js") }}"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
