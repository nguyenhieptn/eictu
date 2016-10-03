@extends('/layouts/student_app')
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

        <div class="col-sm-3" id="find">
            <form action="{{ url('chat/friend') }}">
                <button type="submit" class="btn btn-info btn-md">+ Tìm bạn sinh viên</button>
            </form>
        </div>

        <div class="col-sm-7">
            <textarea class="form-control" rows="3" id="comment" placeholder="Type your message. Enter to send !"></textarea>
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-lg" id="send">Send</button>
            <div class="chat-status">Status: <span>Wait</span></div>
        </div>
    </div>

    <div class="row">


    </div>

    <script src="http://45.32.41.40:8088/socket.io/socket.io.js"></script>
    <script>
        (function(){
            var getNode = function(s){
                        return document.querySelector(s);

                    },

                    //Get required nodes
                    status = getNode('.chat-status span'),
                    messages = getNode('.chat-messages'),
                    list_room = getNode('.room-list'),
                    chatID = getNode('.chat-id'),
                    chatName = getNode('.chat-name'),
                    chatRoom = getNode('.chat-room'),


                    StatusDefault = status.textContent,

                    setStatus= function(s){
                        status.textContent = s;

                        if(s!== StatusDefault)
                        {
                            var delay = setTimeout(function(){
                                setStatus(StatusDefault);
                            },3000);
                        }
                    };

            try{
                var socket = io.connect('http://45.32.41.40:8088');
            }catch(e)
            {
                //set status to warn user
            }
            var id = chatID.value,
                name = chatName.value,
                room = chatRoom.value,
                time,
                nd = "";

            socket.emit('input-one',{
                id: id,
                name: name,
                room: room
            });
            var message,rooms,room_link;
            var arr_room=[];
            var arr_friend_room = [];
            var dem = 0;
            var fLen = 0;
            if(socket !== undefined)
            {
                //Lisen for output
                socket.on('output', function(data){
                    if(data.length)
                    {
                        for(var x=0;x<data.length; x=x+1)
                        {
                            if(data[x].room == chatRoom.value){
                                message = document.createElement('div');
                                if(data[x].id !== chatID.value){
                                    var message1 = document.createElement('div');
                                    message1.setAttribute('id','left');

                                    var message2 = document.createElement('div');
                                    message2.setAttribute('id','divtitle');

                                    var tit = document.createElement('div');
                                    tit.setAttribute('id','title1');

                                    tit.innerHTML = data[x].name;

                                    var mg = document.createElement('div');
                                    mg.setAttribute('id','mg');

                                    mg.innerHTML = ' ' + data[x].message;

                                    var time1 = document.createElement('div');
                                    time1.setAttribute('id','time1');

                                    time1.innerHTML =data[x].time;

                                    var anh = document.createElement('div');
                                    anh.setAttribute('id','image1');

                                    message2.appendChild(anh);
                                    message2.appendChild(tit);
                                    message1.appendChild(message2);
                                    message1.appendChild(mg);
                                    message1.appendChild(time1);

                                    message.appendChild(message1);

                                }else{
                                    var message1 = document.createElement('div');
                                    message1.setAttribute('id','right');

                                    var mg = document.createElement('div');
                                    mg.setAttribute('id','mg');

                                    mg.innerHTML =data[x].message + '   ';

                                    var time1 = document.createElement('div');
                                    time1.setAttribute('id','time2');

                                    time1.innerHTML =data[x].time;

                                    message1.appendChild(mg);
                                    message1.appendChild(time1)

                                    message.appendChild(message1);

                                }
                                messages.appendChild(message);
                                messages.insertBefore(message, messages.firstChild);
                            }
                        }

                        for(var y=0;y<data.length; y=y+1)
                        {
                            if(data[y].id == chatID.value){
                                dem = 0;
                                fLen = arr_room.length;
                                for(var i=0;i<fLen;i++){
                                    if(arr_room[i] == data[y].room){
                                        dem = dem +1;
                                    }
                                }
                                if(dem==0){
                                    arr_room.push(data[y].room);
                                    arr_friend_room.push(data[y].friendname);
                                }
                            }
                            if (data[y].room == chatID.value) {
                                dem = 0;
                                fLen = arr_room.length;
                                for (var i = 0; i < fLen; i++) {
                                    if (arr_room[i] == data[y].id) {
                                        dem = dem + 1;
                                    }
                                }
                                if (dem == 0) {
                                    arr_room.push(data[y].id);
                                    arr_friend_room.push(data[y].name);
                                }
                            }
                        }
                    }
                    while(list_room.firstChild){
                        list_room.removeChild(list_room.firstChild);
                    }



                    for(var z=0;z<arr_room.length;z++){
                        rooms = document.createElement("div")
                        room_link = document.createElement("a");
                        room_link.setAttribute("id", "room-link");
                        if (arr_room[z].length < 10 ) {
                            if (chatRoom.value == room){
                                room_link.innerHTML = "<h5 style='color: #ff000f'>" + chatRoom.value + "</h5>";
                            } else {
                                room_link.innerHTML = "<h5>" + chatRoom.value + "</h5>";
                            }

                            room_link.href = 'classrooms';
                        } else {
                            room_link.innerHTML = "<h5>" + arr_friend_room[z] + "</h5>";
                            room_link.href = 'friendroom?id='+chatID.value+'&friend='+ arr_room[z];
                        }

                        rooms.setAttribute("class", "room-list");
                        rooms.appendChild(room_link);

                        list_room.appendChild(rooms);
                        list_room.insertBefore(rooms, list_room.firstChild);
                    }
                });



                //listen for s status
                socket.on('status',function(data){
                    setStatus((typeof data === 'object')? data.message: data);

                    if(data.clear === true )
                    {
                        textarea.value = '';
                    }
                });

                var today,h,i,m,j,s,d,month,y,k,l;
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
                        id:id,
                        name: name,
                        room: room,
                        friendname:room,
                        message: nd,
                        time: time
                    });

                };
                var textarea = document.getElementById('comment');
                textarea.addEventListener('keydown', function (e){
                    code = e.keyCode ? e.keyCode : e.which;
                    if (code == 13) {
                        today = new Date();
                        l = today.getHours();
                        if(l<10){h="0"+l;}else{h=l;}
                        i = today.getMinutes();
                        if(i<10){m= "0"+i;}else{m=i;}
                        j = today.getSeconds();
                        if(j<10){s= "0"+j;}else{s=j;}
                        d = today.getDate();
                        k = today.getMonth();
                        if(k>8){month=k+1;}else{month = "0"+(k+1);}
                        y = today.getFullYear();

                        time = h+":"+m+":"+s+" / "+d+"-"+month+"-"+y;
                        nd = textarea.value;
                        socket.emit('input',{
                            id: id,
                            name: name,
                            room: room,
                            friendname:room,
                            message: nd,
                            time: time
                    });
                    }
                });
            }
        })();
    </script>
@stop
