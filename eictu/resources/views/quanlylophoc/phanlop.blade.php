@extends('quanlylophoc.main')
@section('title')
	Trang phân lớp cho sinh viên
@endsection		


@section('content')
<script language="javascript">
$(document).ready(function(){
	loadtable('');		
});
function loadtable(_page)
{
	var rowperpage=10;
	var _url="{{ URL::to('qllh/phanlop/table/') }}/{{ $lop->lopid }}";
	if( _page!=="") _url=_url+"?page="+_page;
	var token = $('#tokenid').val();
	$.ajax({
		url : _url,
		type : 'get',
		dataType : 'json',
		data:{'_token':token,'rowperpage':rowperpage},
		success : function (data){  
			var html = '';
			html += '<table class="table" id="table_dssv1">';	
			
			html +='<tr>';
			html +='<td align="left" class="col-md-1" colspan="12" >';
			html +='Nhấn vào tên sinh viên để thêm vào lớp {{ $lop->tenlop }}';
			html +='</td>';
			html +='</tr>';			
			 
			var i=0;
			if( _page!=="")i= (parseInt(_page)-1)*rowperpage;
			$(data['result']).each (function (key, item){
				i++;
				html +=  '<tr>';
				html +=  '<th>';
				html +=  i;
				html +=  '</th>';
				html +=  '<th>';
				html +=  item['manganh'];
				html +=  '</th>';
				html +=  '<th><span value="';
				html +=  item['masv'];
				html +='" class="htsvpl">';
				html +=  item['hoten'];
				html +=  '</span></th>';
				html +=  '<th>';
				html +=  item['gioitinh'];
				html +=  '</th>';
				html +=  '<th class="col-md-8" colspan="8">';
				var d=item['ngaysinh'].split("-");							
				html +=  d[2]+"/"+d[1]+"/"+d[0];
				html +=  '</th>';
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
	var url = "{{ URL::to('qllh/phanlop/') }}/{{ $lop->lopid }}" ;
	var _page ="";
	if(typeof $(".pagination .active").html()!=='undefined')
	{
		_page=$(".pagination .active").html().substring(6,7);
	}	
	$object=$(this);
	$($object).parents('tr').remove();
	$.post(url, {'_token': _token, 'masv': masv }, function(res){
		loadtable(_page);			
	});		
});
</script>
<div class="qllophoc_header">
	<header id="header" class="">
		<div class="header-content">
		<span class="title">eICTUStudentJoinClass - Thêm sinh viên vào lớp học</span>
		</div>
	</header>
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
	 Danh sách Sinh viên trúng tuyển chưa phân lớp.	 
</div>
	<input id = "tokenid" type=hidden name=_token value={{csrf_token()}} />	
	<div class="dssv">	
		<table class="table" id="table_dssv1">		
		</table>
		<div id="pagination">			
		</div>		
		<form method="get" action="{{ URL::to('qllh/dssv/') }}/{{ $lop->lopid }}">
			<center>
				<button type=submit onclick="return refreshAndClose();" >
					Đóng
				</button>
			</center>			
			<script type="text/javascript">
				function refreshAndClose() {
					window.opener.location.reload(true);
					window.close();
				}
			</script>
		</form>
   </div>
</div>
@endsection			
  
   