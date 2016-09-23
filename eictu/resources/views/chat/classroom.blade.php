@extends('/layouts/app')
@section('content')

    <?php
    $class_room = $_GET['c'];
    $id = $_GET['id'];
    ?>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h4>eICTuChatClassRoom - Phòng Chat của lớp <span><?php echo $class_room;?></span></h4>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <input type="hidden" class="chat-room" value="<?php echo $class_room;?>"/>
            <input type="text" disabled="disabled" class="chat-name" value="<?php echo $id;?>"/>
        </div>
        <div class="col-lg-8 col-lg-offset-2 chat-messages"></div>
    </div>

    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">
            <input class="form-control input-lg chat-input" id="inputlg" type="text"
                   placeholder="Type your message">
        </div>
        <div class="col-lg-2">
            <button type="button" id="send" class="btn btn-primary btn-lg">Send</button>
        </div>

        <div class="col-lg-8 col-lg-offset-2 chat-status">Status: <span>Idle</span></div>
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

            if (socket !== undefined) {
                //Lisen for output
                socket.on('output', function (data) {
                    if (data.length) {
                        for (var x = 0; x < data.length; x = x + 1) {
                            if (data[x].room == chatRoom.value) {
                                var message = document.createElement('div');
                                message.setAttribute('class', 'chat-message');
                                message.textContent = data[x].name + ': ' + data[x].message;

                                messages.appendChild(message);
                                messages.insertBefore(message, messages.lastChild);
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

                var name = chatName.value,
                        room = chatRoom.value;
                nd = "";
                var button = document.getElementById("send");
                button.onclick = function () {
                    nd = document.querySelector('.chat-input').value;
                    socket.emit('input', {
                        name: name,
                        room: room,
                        message: nd
                    });
                };

            }
        })();
    </script>
@stop
