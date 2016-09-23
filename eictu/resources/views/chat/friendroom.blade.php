@extends('/layouts.app')
@section('content')

    <?php
    $friend = $_GET['friend'];
    $id = $_GET['id'];
    ?>


    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" id="purple">
            <h4>eICTuChatFriendRoom - Phòng CHAT với <span><?php echo $friend;?></span></h4>
        </div>
        <div class="col-lg-8 col-lg-offset-2">
            <input type="hidden" class="chat-friend" value="<?php echo $friend;?>"/>
            <input type="text" disabled="disabled" class="chat-name" value="<?php echo $id;?>"/>
        </div>

        <div class="col-lg-8 col-lg-offset-2 chat-messages" style="height: 450px;"></div>

    </div>

    <div class="row  message">
        <div class="col-lg-8 col-lg-offset-2">
            <input class="form-control input-lg chat-input" id="inputlg" type="text" placeholder="Type your message">
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-primary btn-lg" id="send">Send</button>
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
                var socket = io.connect('http://127.0.0.1:8088');
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
                        friend = chatFriend.value;
                nd = "";
                var button = document.getElementById("send");
                button.onclick = function () {
                    nd = document.querySelector('.chat-input').value;
                    socket.emit('input', {
                        name: name,
                        room: friend,
                        message: nd
                    });

                };

            }
        })();
    </script>
@stop