@extends('layouts.app')		
		
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/bootstrap.min.css')!!}">
			
		<link rel="stylesheet" type="text/css" 
			href="{!! url('classes_src/css/classes.css')!!}">	
			
		<script src="{!! url('classes_src/js/jquery.min.js')!!}">
		</script>
		
		<script src="{!! url('classes_src/js/classes.js')!!}"></script>
	
		@section('title')
			Quản lý lớp học - Trang phân lớp cho sinh viên
		@endsection		

	
@section('content')
<div class="container">
<script language="javascript">
$(document).ready(function(){
	loadtable('');		
});
function loadtable(_page)
{
	var rowperpage=10;
	
	var _url="{{ route('classes.waitingstudentlist',$_class->id)}}";
	var sid = '{{$_schoolid}}';
	if( _page!=="") _url=_url+"?page="+_page;
	var token = $('#tokenid').val();
	$.ajax({
		url : _url,
		type : 'get',
		dataType : 'json',
		data:{'_token':token,'rowperpage':rowperpage,'schoolid':sid},
		success : function (data){  
			var html = '';
			html += '<table class="table" id="table_dssv1">';	
			
			html +='<tr>';
			html +='<td align="left" class="col-md-1" colspan="12" >';
			html +='Nhấn vào tên sinh viên để thêm vào lớp {{ $_class->name }}';
			html +='</td>';
			html +='</tr>';			
			html +=  '<tr>';
			html +=  '<th>';
			html +=  "STT";
			html +=  '</th>';
			html +=  '<th>';
			html +=  "Mã ngành";
			html +=  '</th>';
			html +=  '<th>';
			html +=  "Họ tên";
			html +=  '</th>';
			html +=  '<th>';
			html +=  "Giới tính";
			html +=  '</th>';
			html +=  '<th class="col-md-8" colspan="8">';
			html += 'Ngày sinh';
			html +=  '</th>';
			html +=  '</tr>';
				
			var i=0;
			if( _page!=="")i= (parseInt(_page)-1)*rowperpage;
			$(data['result']).each (function (key, item){
				i++;
				html +=  '<tr>';
				html +=  '<td>';
				html +=  i;
				html +=  '</td>';
				html +=  '<td>';
				html +=  item['major_code'];
				html +=  '</td>';
				html +=  '<td><span value="';
				html +=  item['studentcode'];
				html +='" class="htsvpl" title="Thêm sinh viên vào lớp">';
				html +=  item['studentname'];
				html +=  '</span></td>';
				html +=  '<td>';
				if(item['gender']=="0")
					html +=  "Nữ";
				else
					html +=  "Nam";
				html +=  '</td>';
				html +=  '<td class="col-md-8" colspan="8">';
				var d=item['birthday'].split("-");							
				html +=  d[2]+"/"+d[1]+"/"+d[0];
				html +=  '</td>';
				html +=  '</tr>';
			});			 
			html +=  '</table>';
			 
			$('#table_dssv1').html(html);
			//alert(data['pagination']);
			$('#pagination').html(data['pagination']);
		}
	});
}
        </script>
<script>
$(document).on('click', '.pagination a', function (event) {
	
    event.preventDefault();
    if ( $(this).attr('href') != '#' ) {
        $("html, body").animate({ scrollTop: 0 }, "fast");
		loadtable($(this).text() );
    }
});
$(document).on('click', '.htsvpl', function () {    
	var token = $('#tokenid');
	var masv = $(this).attr("value");
	//alert(masv);
	var _token = token.val();
	var url = "{{ route('classes.studentjoinclass',$_class->id)}}" ;
	var _page ="";
	if(typeof $(".pagination .active").html()!=='undefined')
	{
		var textp=$(".pagination .active").html();
		var inp = textp.indexOf("<",5)
		_page=textp.substring(6,inp);
	}	
	$object=$(this);
	
	$.post(url, {'_token': _token, '_code': masv }, function(res){
		
		$($object).parents('tr').remove();
		loadtable(_page);			
	});		
});
</script>
<div class="qllophoc_header">
<!--
	<header id="header" class="">
		<div class="header-content">
		<span class="title">
			eICTUStudentJoinClass - Thêm sinh viên vào lớp học
			@if(!Auth::guest())
						<span class="pull-right">
							<img src="{!! url('classes_src/images/logout.png')!!}" />
							<a href="{{ route('classes.logout')}}">Logout</a>
						</span>
			@endif
		</span>
		</div>
	</header>
	-->
<!--
	<table class="table" >
		<tr>
			<td><span class="tieude">eICTUStudentJoinClass - Thêm sinh viên vào lớp học</span></td>
			<td align="right"><img src="{!! url('quanlylophoc/images/logout.png')!!}" /><span class="tieude">Logout</span></td>
		</tr>
	</table>
-->

</div>
<div class="qllophoc_content">
	 Danh sách sinh viên trúng tuyển chưa phân lớp.
</div>
	<input id = "tokenid" type=hidden name=_token value={{csrf_token()}} />	
	<div class="dssv">	
		<table class="table" id="table_dssv1">		
		</table>
		<div id="pagination">			
		</div>		
		<form method="get" action="{{ route('classes.studentlist',$_class->id)}}">
			<center>
				<button type=submit 
					onclick="location.href='
					{{ 	route('classes.studentlist',$_class->id)}}'" 
					class="btn btn-success"
				>
					ĐÓNG
				</button>
			</center>			
			
		</form>
   </div>
</div>
</div>
@endsection			
  
   
