<!DOCTYPE HTML>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <meta name="author" content="GallerySoft.info" />
    <link rel="stylesheet" type="text/css" href="{{ url("/css/style.css") }}"/>
    <title>Quản lý sinh viên</title>
</head>

<body>
<div class="wrapper">
    <h1>Quản lý sinh viên</h1>
    <div class="pagewrapper">
        <div class="top">
            <span>eICTuStudentLogin - Trang chủ của sinh viên</span>
            <div><a href="#">Logout</a></div>
        </div>
        <div class="content1">
            <table>
                <tr>
                    <td ><img src="{{ url('img/radio.png')}}" id="topimg"/></td>
                    <td id="toptext">{{$name}}</td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Sinh nhật bạn cùng lớp</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Tôi muốn <span>- I Want </span></a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Tôi có <span>- I Have </span></a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Tôi tìm việc <span>- I Am Finding a Part-time Job </span></a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Nơi ở của bạn trong kí túc xá</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Bạn tôi thuê nhà ở đâu</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Chát với cả lớp ICT11</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Chát với bạn</a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td><a href="#">Tìm đồ cũ </a></td>
                </tr>

                <tr>
                    <td><img src="{{url('img/rightarrow.png')}}"/></td>
                    <td>LMS</td>
                </tr>

            </table>
        </div>
    </div>
</div>


</body>
</html>