@extends('layouts.app')
@section('content')
	 <div class="container">
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
                        <p>Họ và tên: <strong>{{$detail->name}}</strong></p>
                        <p>Giới tính:<strong>
                            @if($detail->gender==1)
                                {{ "Nam" }}
                            @else
                                    {{ "Nữ" }}
                             @endif
                            </strong></p>
                          <p>Ngày đăng : <strong>{{$detail->created_at}}</strong></p>
                    </div>
             </div>
         </div>
     </div>
 </div>
@endsection