@extends('/layouts.app')
@section('content')

    <?php

    $friend = $_GET['friend'];
    $id = $_GET['id'];

        $student1 = DB::table('students')->where('code', $friend)->first();
        $friend_name = $student1->name;
        $student2 = DB::table('students')->where('code', $id)->first();
        $name = $student2->name;
    ?>


    <div class="row">
        <div class="col-sm-8 col-sm-offset-2" id="purple">
            <h4>Phòng Chat với <span><?php echo $friend_name;?></span></h4>
        </div>
        <div class="col-sm-8 col-sm-offset-2">
            <input type="hidden" class="chat-friend" value="<?php echo $friend_name;?>"/>
            <input type="hidden" class="chat-friend-id" value="<?php echo $friend;?>"/>
            <input type="hidden" class="chat-id" value="<?php echo $id;?>"/>
            <input type="hidden" class="chat-name" value="<?php echo $name;?>"/>
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
                    chatId = getNode('.chat-id'),
                    chatName = getNode('.chat-name'),
                    chatFriend = getNode('.chat-friend-id'),
                    chatFriendName = getNode('.chat-friend'),
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
                            if ((data[x].room == chatFriend.value && data[x].id == chatId.value) || (data[x].id == chatFriend.value && data[x].room == chatId.value)) {
                                var message = document.createElement('div');
                                if (data[x].id !== chatId.value) {

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

                                    mg.innerHTML = data[x].message + '  ';

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
                        document.querySelector('.chat-input').value = '';
                    }
                });

                var today, h, i, m, j, s, d, month, y, k, l;
                var id = chatId.value,
                        name = chatName.value,
                        friend = chatFriend.value,
                        friend_name = chatFriendName.value,
                        time,
                        nd = "";
                var button = document.getElementById("send");

                var code;
                var textarea = document.getElementById('comment');

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
                        id: id,
                        name: name,
                        friendname: friend_name,
                        room: friend,
                        message: nd,
                        time: time
                    });

                };


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
                            id: id,
                            name: name,
                            friendname: friend_name,
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