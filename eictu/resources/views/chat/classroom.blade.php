@extends('/layouts/app')
@section('content')

    <?php
    $user_id = Auth::user()->username;
    $class_room = $_GET['c'];

    if (Auth::user()->type == 2){
        $name = Auth::user()->name;
    } else {

    $st = DB::table('students')->where('code', $user_id)->first();
    $class_id = $st->class_id;
    $class = DB::table('classes')->where('id', $class_id)->first();
    $class_name = $class->name;

    if ($class_room == $class_name){
        $student = DB::table('students')->where('code', $user_id)->first();
        $name = $student->name;
    } else {
    ?>

    <div class="row">
        <br><br><br><br>
        <h2 id="purple">Bạn không có quyền hạn để truy cập vào đường dẫn này. Xin mời logout
            và đăng nhập lại
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
            </form>
        </h2>
    </div>

    <?php
    return false;
    }
    }

    ?>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="purple">
            <h4>Phòng Chat của lớp <span><?php echo $class_room;?></span>
                {{--<a style="float:right;" href="{{ url('/logout') }}"--}}
                {{--onclick="event.preventDefault();--}}
                {{--document.getElementById('logout-form').submit();">--}}
                {{--Logout--}}
                {{--</a>--}}

                {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST">--}}
                {{--{{ csrf_field() }}--}}
                {{--</form>--}}
            </h4>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <input type="hidden" class="chat-room" value="<?php echo $class_room;?>"/>
            <input type="hidden" class="chat-name" value="<?php echo $name;?>"/>
            <input type="hidden" class="chat-id" value="<?php echo $user_id;?>"/>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <div class="col-sm-4 list-room">
                <div class="room-list"></div>
            </div>
            <div class="col-sm-8 chat-messages">
                <div id="left"></div>
                <div id="right"></div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-7 col-sm-offset-2">
            <textarea class="form-control" rows="3" id="comment" placeholder="Nhập mã nội dung Chat"></textarea>
            {{--<input class="form-control input-lg chat-input" id="inputlg" type="text"--}}
            {{--placeholder="Type your message">--}}
        </div>
        <div class="col-sm-2">
            <button type="button" id="send" class="btn btn-primary btn-lg">Send</button>
        </div>

        <div class="col-sm-8 col-sm-offset-2 chat-status">Status: <span>Idle</span></div>
    </div>

    <script src="http://127.0.0.1:8088/socket.io/socket.io.js"></script>
    <script>
        (function () {
            var getNode = function (s) {
                        return document.querySelector(s);

                    },

                    //Get required nodes
                    status = getNode('.chat-status span'),
                    messages = getNode('.chat-messages'),
                    chatName = getNode('.chat-name'),
                    chatRoom = getNode('.chat-room'),
                    chatId = getNode('.chat-id'),
                    list_room = getNode('.room-list'),

                    StatusDefault = status.textContent,

                    setStatus = function (s) {
                        status.textContent = s;

                        if (s !== StatusDefault) {
                            var delay = setTimeout(function () {
                                setStatus(StatusDefault);
                            }, 3000);
                        }
                    };

            try {
                var socket = io.connect('http://127.0.0.1:8088');
            } catch (e) {
                //set status to warn user
            }
            var rooms, room_link;
            if (socket !== undefined) {

                socket.on('listroom', function (data) {
//                    alert("123");
                    var id = chatId.value;
                    for (var y = 0; y < data.length; y++) {
                        var str = data[y].name;
                        var str1 = str.substring(0, 17),
                                str2 = str.substring(17, 34);
                        rooms = document.createElement("div");
                        room_link = document.createElement("a");
                        room_link.setAttribute("id", "room-link");

//                        room_link.href = 'chatClassRoom.php?c=' + data[y].name + '&id=' + data[y].name;

                        if (str.length < 10){
                            room_link.innerHTML = "<h4>[G] " + str + "</h4>";
                            room_link.href = 'classroom?c=' + str;
                        } else if (str1 == id) {
                            room_link.innerHTML = "<h4>[P] " + str2 + "</h4>";
                            room_link.href = 'friendroom?id=' + str1 + '&friend=' + str2;
                        } else {
                            room_link.innerHTML = "<h4>[P] " + str1 + "</h4>";
                            room_link.href = 'friendroom?id=' + str2 + '&friend=' + str1;
                        }

                        rooms.setAttribute("class", "room-list");
                        rooms.appendChild(room_link);

                        list_room.appendChild(rooms);
                        list_room.insertBefore(rooms, list_room.lastChild);
                    }
                });

                //Lisen for output
                socket.on('output', function (data) {
                    if (data.length) {

                        for (var x = 0; x < data.length; x = x + 1) {
                            if (data[x].room == chatRoom.value) {
                                var message = document.createElement('div');
//                                alert(data[x].name + " - " + chatName.value);
                                if (data[x].name !== chatName.value) {
                                    var message1 = document.createElement('div');
                                    message1.setAttribute('id', 'left');

                                    var message2 = document.createElement('div');
                                    message2.setAttribute('id', 'divtitle');

                                    var tit = document.createElement('div');
                                    tit.setAttribute('id', 'title1');

                                    tit.innerHTML = data[x].name;

                                    var mg = document.createElement('div');
                                    mg.setAttribute('id', 'mg');

                                    mg.innerHTML = ' ' + data[x].message;
                                    alert(data[x].name);
                                    var time1 = document.createElement('div');
                                    time1.setAttribute('id', 'time1');

                                    time1.innerHTML = data[x].time;

                                    var anh = document.createElement('div');
                                    anh.setAttribute('id', 'image1');

                                    message2.appendChild(anh);
                                    message2.appendChild(tit);
                                    message1.appendChild(message2);
                                    message1.appendChild(mg);
                                    message1.appendChild(time1);

                                    message.appendChild(message1);

                                } else {
                                    var message1 = document.createElement('div');
                                    message1.setAttribute('id', 'right');

                                    var mg = document.createElement('div');
                                    mg.setAttribute('id', 'mg');

                                    mg.innerHTML = data[x].message + ' <= ';

                                    var time1 = document.createElement('div');
                                    time1.setAttribute('id', 'time2');

                                    time1.innerHTML = data[x].time;

                                    message1.appendChild(mg);
                                    message1.appendChild(time1);

                                    message.appendChild(message1);
                                }
                                messages.appendChild(message);
                                messages.insertBefore(message, messages.firstChild);
                            }

                        }

                    }
                });


                //listen for s status
                socket.on('status', function (data) {
                    setStatus((typeof data === 'object') ? data.message : data);

                    if (data.clear === true) {
                        textarea.value = '';
                    }
                });

                var today, h, i, m, j, s, d, month, y, k, l;
                var name = chatName.value,
                        room = chatRoom.value,
                        id = chatId.value,
                        time,
                        nd = "";
                var button = document.getElementById("send");

                //Load
                socket.emit('load', {
                    name: id,
                    friend: "",
                    class_name: room
                });

                button.onclick = function () {
                    today = new Date();
                    l = today.getHours();
                    if (l < 10) {
                        h = "0" + l;
                    } else {
                        h = l;
                    }
                    i = today.getMinutes();
                    if (i < 10) {
                        m = "0" + i;
                    } else {
                        m = i;
                    }
                    j = today.getSeconds();
                    if (j < 10) {
                        s = "0" + j;
                    } else {
                        s = j;
                    }
                    d = today.getDate();
                    k = today.getMonth();
                    if (k > 8) {
                        month = k + 1;
                    } else {
                        month = "0" + (k + 1);
                    }
                    y = today.getFullYear();

                    time = h + ":" + m + ":" + s + " / " + d + "-" + month + "-" + y;
                    nd = textarea.value;
                    socket.emit('input-class', {
                        name: name,
                        room: room,
                        message: nd,
                        time: time
                    });

                };

                var code;
                var textarea = document.getElementById('comment');
                textarea.addEventListener('keydown', function (e) {
                    code = e.keyCode ? e.keyCode : e.which;
                    if (code == 13) {
                        today = new Date();
                        l = today.getHours();
                        if (l < 10) {
                            h = "0" + l;
                        } else {
                            h = l;
                        }
                        i = today.getMinutes();
                        if (i < 10) {
                            m = "0" + i;
                        } else {
                            m = i;
                        }
                        j = today.getSeconds();
                        if (j < 10) {
                            s = "0" + j;
                        } else {
                            s = j;
                        }
                        d = today.getDate();
                        k = today.getMonth();
                        if (k > 8) {
                            month = k + 1;
                        } else {
                            month = "0" + (k + 1);
                        }
                        y = today.getFullYear();

                        time = h + ":" + m + ":" + s + " / " + d + "-" + month + "-" + y;
                        nd = textarea.value;

                        socket.emit('input-class', {
                            name: name,
                            room: room,
                            message: nd,
                            time: time
                        });
                    }
                });
            }
        })();
    </script>
@stop
