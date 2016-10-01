@extends('layouts.school_app')

@section('title')
    Lớp Học - Sinh viên trong lớp
@endsection
@section('content')
    <div >
        <div class="row">
            
                <div class="panel panel-default">
					<div class="panel-heading">
						 Danh sách sinh viên lớp <strong>{{ $_class->name }}</strong>
					</div>
                    <div class="panel-body">
                        <a class="btn btn-primary" href="{{ route('classes.studentjoinclass',$_class->id)}}" >	   
					THÊM SINH VIÊN VÀO LỚP
				</a>
                        <br/>
                        <br/>
                       
                        <table class="table">
                            <tr>
                               <th>STT</th>
                                <th>Mã sinh viên</th>
								 <th>Họ tên</th>
                            </tr>

                        @if (count($_students) === 0 )
			<tr>
				<td align="left">
					Chưa có sinh viên
				</td>
			</tr>
			@else
				@foreach ($_students as $_student)						
					<tr>
						<td>
							@if(isset($_page) && count($_page>0))							
								{{ $loop->iteration + $_page }}.
							@else								
								{{ $loop->iteration }}
							@endif
						</td>
						<td  >
							{{ $_student->code }}
						</td>
						<td >
							{{ $_student->name }}
						</td>							
					</tr>
				@endforeach
			@endif						
		</table>
		@if (count($_students) >0 )
			{{ $_students->links() }}
		@endif
  
                </div>
            </div>
        </div>
    </div>
@endsection
