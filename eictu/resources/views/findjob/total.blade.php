@extends('layouts.student_app')
@section('content')
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{url('/js/app-main.js')}}"></script>
	<div class="panel panel-default find-job">
        <div class="panel-heading">Quản lý Bài đăng tìm việc </div>
        <div class="panel-body">
         	@if(Session::has('success'))
	            <div class="alert alert-success alx">
	               {{Session::get('success')}}
	            </div>
        	@endif
          	<table class="table table-striped">
			    <thead>
			      <tr>
			       <th>Stt</th>
			        <th>Nội Dung</th>
			        <th>Thời Gian</th>
			        <th colspan="2">Hành động</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php  $i=0 ;?>
			    @foreach($total as $item)
			      <tr>
			     	<td><?php echo $i +=1?></td>
			        <td><a href="{{url('findjob/detail',$item['id'])}}"><?php echo substr($item['content'], 0,80) ?> ..</a></td>
			        <td><?php echo date('d/m/Y',strtotime($item['created_at'])) ?></td>
			        <td>
				        <a href="{{route('findjob.del',$item['id'])}}" class="btn btn-danger" onclick="return confirm('bạn có chắc chắn muốn xóa không ? ')">Del </a>
				        <a href="{{route('findjob.edit',$item['id'])}}"class="btn btn-info">Edit </a>
			        </td>
			      </tr>
			      @endforeach
			    </tbody>
			  </table>
			   <div class="pull-right">{{$total->render()}}</div> 
        </div>
    </div>
@endsection
