@extends('layouts.student_app')
@section('content')
     <div class="row find-job" >
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">Bản tin tìm việc chi tiết của sinh viên</div>
                 <div class="panel-body">
                    </hr>
                      <div class="entry-content">
                            <div class='media' style="margin-bottom:15px">
                                 <a href='' class='media-left' href='#'><img class='media-object'  class="img-rounded" src="<?php echo ($detail->avatar == null) ? "/img/user-image01.png" : $detail->avatar?>" alt=''></a>
                                 <div class='media-body'> 
                                     <h3 class='media-heading'><strong>{{$detail->name}}</strong></h3>
                                     <p>  Ngày đăng : <strong><?php echo date('d-m-Y',strtotime($detail->day))?></strong></p>
                                     <p>Nội Dung bản tin :<br/> {{$detail->content}}</p>
                                     <p>Giới tính: 
                                     <strong>
                                            @if($detail->gender==1)
                                                {{ "Nam" }}
                                            @else
                                                {{ "Nữ" }}
                                             @endif
                                    </strong></p>
                                 </div>
                            
                                <div class ="col-md-12 " style="margin-top: 30px">
                                    <div class="col-md-2">
                                          <form action="{{ url('findjob/index') }}">
                                            <Button class="btn btn-danger"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Back </a></Button></center>
                                         </form>
                                    </div>

                                    <!-- SENT MESSAGE  -->
                                    <!-- để lấy Ma sv $detail->code -->
                                    <div class="col-md-10">
                                          <form action="{{ url('chat_guest/guest') }}" method="post">
                                            <Button class="btn btn-danger"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                                                Sent Message
                                            </Button>
                                         </form>
                                    </div>
                         
                            </div>

                      </div>
                   
             </div>
         </div>
     </div>
@endsection