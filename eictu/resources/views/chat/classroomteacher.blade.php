@extends('teacher.master')
@section('content')

    <?php
    $user_id = Auth::user()->username;
    $class_room = $_GET['c'];

    $classes = DB::table('classes')->get();

    if (Auth::user()->type == 2){
        $name = Auth::user()->name;
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

    ?>
    <div class="row">
        <div class="col-sm-12" id="colors">
            <h4>Phòng Chat của lớp <span><?php echo $class_room;?></span>
            </h4>
        </div>
        <div class="col-sm-12">
            <input type="hidden" class="chat-room" value="<?php echo $class_room;?>"/>
            <input type="hidden" class="chat-name" value="<?php echo $name;?>"/>
            <input type="hidden" class="chat-id" value="<?php echo $user_id;?>"/>
        </div>
        <div class="col-sm-3 list-room">
            <div class="room-list"></div>
        </div>
        <div class="col-sm-9 chat-messages">
            <div id="left"></div>
            <div id="right"></div>
        </div>

        <div class="col-sm-10">
            <textarea class="form-control" rows="3" id="comment" placeholder="Type your message. Enter to send !"></textarea>
        </div>
        <div class="col-sm-2">
            <button type="button" id="send" class="btn btn-primary btn-lg">Send</button>
            <div class="chat-status">Status: <span>Wait</span></div>
        </div>

    </div>

    <div class="row">


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
                    list_room = getNode('.room-list'),
                    chatName = getNode('.chat-id'),
                    chatRoom = getNode('.chat-room'),

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
                    room = chatRoom.value,
                    time,
                    nd = "";

            socket.emit('input-one', {
                name: name,
                room: room
            });
            var message, rooms, room_link;
            var arr_room = [];
            var dem = 0;
            var fLen = 0;
            if (socket !== undefined) {
                //Lisen for output
                socket.on('output', function (data) {
                    if (data.length) {
                        for (var x = 0; x < data.length; x = x + 1) {
                            if (data[x].room == chatRoom.value) {
                                message = document.createElement('div');
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

                                    innerHTML = data[x].name


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

                    <?php
                        foreach ($classes as $class) {
                            ?>
                            var temp_name = "<?php echo $class->name; ?>";
                            rooms = document.createElement("div");
                            room_link = document.createElement("a");
                            room_link.setAttribute("id", "room-link");

                            if (temp_name == chatRoom.value){
                                room_link.innerHTML = "<h5 style='color: #ff000f'>" + temp_name + "</h5>";
                            } else {
                                room_link.innerHTML = "<h5>" + temp_name + "</h5>";
                            }
                            room_link.href = 'classroomteacher?c=' + temp_name;

                            rooms.setAttribute("class", "room-list");
                            rooms.appendChild(room_link);

                            list_room.appendChild(rooms);
                            list_room.insertBefore(rooms, list_room.firstChild);
                    <?php
                        }
                    ?>

                });


                //listen for s status
                socket.on('status', function (data) {
                    setStatus((typeof data === 'object') ? data.message : data);

                    if (data.clear === true) {
                        textarea.value = '';
                    }
                });

                var today, h, i, m, j, s, d, month, y, k, l;
                var code;

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
                        room: room,
                        message: nd,
                        time: time
                    });

                };
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
