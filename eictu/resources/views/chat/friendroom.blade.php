@extends('/layouts.student_app')
@section('content')

    <?php

    $user_id = Auth::user()->username;

    $friend = $_GET['friend'];
    $id = $_GET['id'];

    if ($user_id == $id){
        $student1 = DB::table('students')->where('code', $friend)->first();
        $namefriend = $student1->name;
        $student2 = DB::table('students')->where('code', $id)->first();
        $name = $student2->name;
        $class_id = $student2->class_id;
        $class = DB::table('classes')->where('id', $class_id)->first();
        $class_name = $class->name;
    } else {
    ?>

    <div class="row">
        <br><br><br><br>
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h2>Bạn không có quyền hạn để truy cập vào đường dẫn này. Xin mời logout và đăng nhập lại
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
    </div>

    <?php
    return false;
    }


    ?>


    <div class="row">
        <div class="col-sm-12" id="purple">
            <h4>Phòng Chat với <span><?php echo $namefriend;?></span></h4>
        </div>
        <div class="col-sm-12">
            <input type="hidden" class="chat-classs" value="<?php echo $class_name;?>"/>
            <input type="hidden" class="chat-friend" value="<?php echo $friend;?>"/>
            <input type="hidden" disabled="disabled" class="chat-name" value="<?php echo $id;?>"/>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4 list-room">
                <div class="room-list"></div>
            </div>
            <div class="col-sm-8 chat-messages">
                <div id="left"></div>
                <div id="right"></div>
            </div>
        </div>

    </div>

    <div class="row  message">
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" id="comment" placeholder="Nhập mã nội dung Chat"></textarea>
            {{--<input class="form-control input-lg chat-input" id="inputlg" type="text" placeholder="Type your message">--}}
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-lg" id="send">Send</button>
        </div>
        <div class="col-sm-8 chat-status">Status: <span>Idle</span></div>
    </div>

    <script src="http://45.32.41.40:8088/socket.io/socket.io.js"></script>
    <script>
        (function () {
            var getNode = function (s) {
                        return document.querySelector(s);
                    },

                    //Get required nodes
                    status = getNode('.chat-status span'),
                    messages = getNode('.chat-messages'),
                    chatName = getNode('.chat-name'),
                    chatFriend = getNode('.chat-friend'),
                    chatClass = getNode('.chat-classs'),
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
                var socket = io.connect('http://45.32.41.40:8088');
            } catch (e) {
                //set status to warn user
            }
            var name = chatName.value,
                    room = chatFriend.value;

            socket.emit('input-one', {
                name: name,
                room: room
            });


            var rooms, room_link;
            var arr_room = [];
            var dem = 0;
            var fLen = 0;

            if (socket !== undefined) {

                socket.on('listroom', function (data) {

                    var name = chatName.value,
                            friend = chatFriend.value;

                    for (var y = 0; y < data.length; y++) {
                        var str = data[y].name;
                        var str1 = str.substring(0, 17),
                                str2 = str.substring(17, 34);
                        rooms = document.createElement("div");
                        room_link = document.createElement("a");
                        room_link.setAttribute("id", "room-link");

//                        room_link.href = 'chatClassRoom.php?c=' + data[y].name + '&id=' + data[y].name;

                        if (str.length < 10) {
                            room_link.innerHTML = "<h4>[G] " + str + "</h4>";
                            room_link.href = 'classrooms';
                        } else if (str1 == name) {
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
                            if ((data[x].room == chatFriend.value && data[x].name == chatName.value) || (data[x].name == chatFriend.value && data[x].room == chatName.value)) {
                                var message = document.createElement('div');
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
                                    message1.appendChild(time1)

                                    message.appendChild(message1);
                                }
                                messages.appendChild(message);
                                messages.insertBefore(message, messages.firstChild);
                            }
                        }

                        for (var y = 0; y < data.length; y = y + 1) {
                            if (data[y].name == chatName.value) {
                                dem = 0;
                                fLen = arr_room.length;
                                for (var i = 0; i < fLen; i++) {
                                    if (arr_room[i] == data[y].room) {
                                        dem = dem + 1;
                                    }
                                }
                                if (dem == 0) {
                                    arr_room.push(data[y].room);
                                }
                            }
                            if (data[y].room == chatName.value) {
                                dem = 0;
                                fLen = arr_room.length;
                                for (var i = 0; i < fLen; i++) {
                                    if (arr_room[i] == data[y].name) {
                                        dem = dem + 1;
                                    }
                                }
                                if (dem == 0) {
                                    arr_room.push(data[y].name);
                                }
                            }
                        }
                    }

                    while (list_room.firstChild) {
                        list_room.removeChild(list_room.firstChild);
                    }

                    rooms = document.createElement("div")
                    room_link = document.createElement("a");
                    room_link.setAttribute("id", "room-link");
                    room_link.innerHTML = "<h4>" + chatClass.value + "</h4>";
                    room_link.href = 'classrooms';

                    rooms.setAttribute("class", "room-list");
                    rooms.appendChild(room_link);

                    list_room.appendChild(rooms);
                    list_room.insertBefore(rooms, list_room.firstChild);

                    for (var z = 0; z < arr_room.length; z++) {
                        rooms = document.createElement("div")
                        room_link = document.createElement("a");
                        room_link.setAttribute("id", "room-link");

                        if (arr_room[z].length < 10 ) {
                            room_link.href = 'classrooms';
                        } else {
                            room_link.innerHTML = "<h4>" + arr_room[z] + "</h4>";
                            room_link.href = 'friendroom?id=' + chatName.value + '&friend=' + arr_room[z];
                        }

                        rooms.setAttribute("class", "room-list");
                        rooms.appendChild(room_link);

                        list_room.appendChild(rooms);
                        list_room.insertBefore(rooms, list_room.firstChild);
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
                        friend = chatFriend.value,
                        class_name = chatClass.value,
                        time,
                        nd = "";
                var button = document.getElementById("send");


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
                    socket.emit('input', {
                        name: name,
                        room: friend,
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

                        socket.emit('input', {
                            name: name,
                            room: friend,
                            message: nd,
                            time: time
                        });
                    }
                });
            }
        })();
    </script>
@stop