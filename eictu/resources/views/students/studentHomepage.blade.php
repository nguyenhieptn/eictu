@extends('/layouts/app')

@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="panel-heading">
                <span>Trang chủ của sinh viên</span>
            </div>
            <div class="content1">
                <table>
                    <tr>
                        <td ><img src="{{ url('img/radio.png')}}" id="topimg"/></td>
                        <td id="toptext">{{$name}}</td>
                    </tr>

                    @if(count($classid)>0 && $classid !=null)
                        <tr>
                            <td><img src="{{url('img/rightarrow.png')}}"/></td>
                            <td>
                                <a href="{{route('classes.classmatersbirthday', $classid )}}">Sinh nhật bạn cùng lớp</a>
                            </td>
                        </tr>
                    @endif

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{route('iwant.search')}}">Tôi muốn <span>- I Want </span></a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('/iHave')}}">Tôi có <span>- I Have </span></a></td>
                    </tr>
                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('findjob/index')}}">Tôi tìm việc <span>- I Am Finding a Part-time Job </span></a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{!! url('dormitory/search')!!}">Nơi ở của bạn trong kí túc xá</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('/rentHouse')}}">Bạn tôi thuê nhà ở đâu</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('chat/classrooms')}}">Chát với cả lớp</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="{{url('chat/friend')}}">Chát với bạn</a></td>
                    </tr>

                    <tr>
                        <td><img src="{{url('img/rightarrow.png')}}"/></td>
                        <td><a href="#">Tìm đồ cũ </a></td>
                    </tr>

                    <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="{{url('LMS/show')}}">LMS</a></td>
                </tr>
                </table>
            </div>
        </div>
</div>
    @endsection
<!-- Scripts --><script src="{{ url("/js/app.js") }}"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
