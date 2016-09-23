@extends('layouts.app')
@section('content')
	 <div class="container find-job">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">eICTuStudentJobDetail - Bản tin tìm việc chi tiết của sinh viên</div>
                 <div class="panel-body">
                    <div class="entry-content">
                        <h4>Nội dung bản tin của sinh viên:</h4>
                        <p>{{$detail->content }}</p>

                    </div>
                    </hr>
                      <div class="entry-content">
                        <h4>Thông tin Sinh viên</h4>
                          <ul>
                            <li>Họ và tên: <strong>{{$detail->name}}</strong></li>
                            <li>Giới tính:<strong>
                                @if($detail->gender==1)
                                    {{ "Nam" }}
                                @else
                                        {{ "Nữ" }}
                                 @endif
                                </strong></li>
                              <li>Ngày đăng : <strong><?php echo date("F j, Y",strtotime($detail->created_at))?></strong></li>
                          </ul>
                      </div>
                     <div style="margin-top: 30px">
                         <center><span  class="btn btn-default"> <a href="{{ url('findjob/index') }}"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>  ĐÓNG</a></span></center>
                     </div>
             </div>
         </div>
     </div>
 </div>
@endsection