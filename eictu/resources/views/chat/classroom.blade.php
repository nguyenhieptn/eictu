@extends('/layouts/app')
@section('content')

    <?php
    $user_id = Auth::user()->username;
    $class_room = $_GET['c'];
    $id = $_GET['id'];

    if (Auth::user()->type == 2){
        $name = Auth::user()->name;
    } else {

    $st = DB::table('students')->where('code', $user_id)->first();
    $class_id = $st->class_id;
    $class = DB::table('classes')->where('id', $class_id)->first();
    $class_name = $class->name;

    if ($class_room == $class_name && $user_id == $id){
        $student = DB::table('students')->where('code', $id)->first();
        $name = $student->name;
    } else {
    ?>

    <div class="row">
        <br><br><br><br>
        <h2 style="margin-left: 200px;">Bạn không có quyền hạn để truy cập vào đường dẫn này. Xin mời logout
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
            <h4>eICTuChatClassRoom - Phòng Chat của lớp <span><?php echo $class_room;?></span>
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
        <div class="col-sm-8 col-sm-offset-2">
            <input type="hidden" class="chat-room" value="<?php echo $class_room;?>"/>
            <input type="hidden" disabled="disabled" class="chat-name" value="<?php echo $name;?>"/>
        </div>
        <div class="col-sm-8 col-sm-offset-2 chat-messages">
            <div id="left"></div>
            <div id="right"></div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <input class="form-control input-sm chat-input" id="inputsm" type="text"
                   placeholder="Type your message">
        </div>
        <div class="col-sm-2">
            <button type="button" id="send" class="btn btn-primary btn-sm">Send</button>
        </div>

        <div class="col-sm-8 col-sm-offset-2 chat-status">Status: <span>Idle</span></div>
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

            if (socket !== undefined) {
                //Lisen for output
                socket.on('output', function (data) {
                    if (data.length) {
                        for (var x = 0; x < data.length; x = x + 1) {
                            if (data[x].room == chatRoom.value) {
                                var message = document.createElement('div');
                                if (data[x].name !== chatName.value) {
                                    message.setAttribute('id', 'left');
                                    message.textContent = data[x].name + ": " + " (" + data[x].time + ") -- " + data[x].message
                                } else {
                                    message.setAttribute('id', 'right');
                                    message.textContent = data[x].message + " -- (" + data[x].time + ")";
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
                        document.querySelector('.chat-input').value = '';
                    }
                });

                var today, h, i, m, j, s, d, month, y, k, l;
                var name = chatName.value,
                        room = chatRoom.value,
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
                    nd = document.querySelector('.chat-input').value;
                    socket.emit('input', {
                        name: name,
                        room: room,
                        message: nd,
                        time: time
                    });

                };
            }
        })();
    </script>
@stop
