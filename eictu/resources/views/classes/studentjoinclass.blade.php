@extends('layouts.school_app')
<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">	
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>
		<style>
			.htsvpl:hover{
				color:red;
				text-decoration: underline;
				cursor: pointer;
				}
		</style>
@section('title')
    Lớp Học - Thêm sinh viên vào lớp học
@endsection
@section('content')
    <div >
        <div class="row">
            
                <div class="panel panel-default">
<div class="panel-heading">
						<strong>Danh sách Sinh viên trúng tuyển chưa phân lớp.</strong>
			</div>
                    <div class="panel-body">
                       <form method="post" 
					   action="{{ route('classes.studentjoinclass',$_class->id)}}"
					   >
					   <input id = "tokenid" type=hidden name=_token value={{csrf_token()}} />	
                        Nhấn vào tên sinh viên để thêm vào lớp {{ $_class->name }}<br/><br/>
                        <table class="table">
						
                            <tr>
                               <th>STT</th>
                                <th>Mã ngành</th>
								 <th>Họ tên</th>
								 <th></th>
								 <th>Giới tính</th>
								 <th>Ngày sinh</th>
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
								{{ $loop->iteration + $_page }}
							@else								
								{{ $loop->iteration }}
							@endif
						</td>
						<td >
							{{ $_student->major_code }}
						</td>
						<td>
							<span class="htsvpl" value="{{ $_student->studentcode }}">
								{{ $_student->studentname }}
							</span>
						</td>	
						<td id="{{ $_student->studentcode }}"></td>
						<td >
							@if ($_student->gender == "1" )
								Nam
							@else
								Nữ
							@endif
						</td>		
						<td>							
							{{ explode("-",$_student->birthday)[2]."/".explode("-", $_student->birthday)[1]."/".explode("-", $_student->birthday)[0] }}							
							

						</td>						
					</tr>
				@endforeach
			@endif			
					
		</table>
		@if (count($_students) >0 )
			{{ $_students->links() }}<br>
		@endif
		<a class="btn btn-primary" href="{{ 	route('classes.studentlist',$_class->id)}}" 
					  >Hủy</a>
		<input class="btn btn-primary" type="submit" value="Thêm mới" name="OK" />
		</form>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>

$(document).on('click', '.htsvpl', function () {    
	
	var masv = $(this).attr("value");
	//alert(masv);
	
	//var x = document.getElementsByName("fname")[0].value;
	if(document.getElementById(masv).innerHTML.trim() =="")
	{
		document.getElementById(masv).innerHTML = "<input type='hidden' name='arrCode[]' value='"+masv+"'/>&#10004;";		
	}else
	{
		document.getElementById(masv).innerHTML = "";
	}
    
});
</script>
                </div>
            </div>
        </div>
    </div>
@endsection
