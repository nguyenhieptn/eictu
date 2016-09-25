@extends('/layouts.app')
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
        <div class="col-sm-8 col-sm-offset-2" id="purple">
            <h4>Phòng Chat với <span><?php echo $namefriend;?></span></h4>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <input type="hidden" class="chat-friend" value="<?php echo $friend;?>"/>
            <input type="hidden" disabled="disabled" class="chat-name" value="<?php echo $id;?>"/>
        </div>

        <div class="col-sm-8 col-sm-offset-2 chat-messages">
            <div id="left"></div>
            <div id="right"></div>
        </div>

    </div>

    <div class="row  message">
        <div class="col-sm-7 col-sm-offset-2">
            <input class="form-control input-lg chat-input" id="inputlg" type="text" placeholder="Type your message">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-lg" id="send">Send</button>
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
                    chatFriend = getNode('.chat-friend'),

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
                            if ((data[x].room == chatFriend.value && data[x].name == chatName.value) || (data[x].name == chatFriend.value && data[x].room == chatName.value)) {
                                var message = document.createElement('div');
                                if (data[x].name !== chatName.value) {
                                    message.setAttribute('id', 'left');
                                    message.innerHTML = data[x].name + ": " + " (" + data[x].time + ") -- " + data[x].message;

                                } else {
                                    message.setAttribute('id', 'right');
                                    message.innerHTML = data[x].message + " -- (" + data[x].time + ")";
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
                        friend = chatFriend.value,
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
                        room: friend,
                        message: nd,
                        time: time
                    });

                };
            }
        })();
    </script>
@stop