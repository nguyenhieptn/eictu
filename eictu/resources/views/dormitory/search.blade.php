@extends('qlktx.app')
@section('title')
QLKTX
@endsection
@section('content')
<div id="lookup">
	<form action="{!! url('get_results') !!}" id="fLookup" method="get" accept-charset="utf-8">
		<div class="col-md-5">
			<div class="col-md-6">
				<div class="form-group">
					<label>Nhà</label>
					<select name="building" class="form-control">
						<option>A1</option>
						<option>A1</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Phòng</label>
					<select name="room" class="form-control">
						<option>1</option>
						<option>2</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<div class="search">
				{!! csrf_field() !!}
				<div class="form-group" id="lookup-group">
				<label>Tìm kiếm</label>
					<input type="text" name="masv" id="inputLookup" value="" class="form-control" placeholder="Nhập mã sinh viên...">
					<i class="fa fa-search fa-fw"></i>
				</div>	
			</div>
		</div>
		
		<div class="col-md-12">
			<div id="resultLookup" class="col-md-6">
				@if(isset($sv))
					@if($sv != [])
					<ul>
						@foreach($sv as $item)
						<li><strong>{!! $item->tensv !!}</strong> ở nhà {!! $item->nha!!}, phòng {!! $item->phong !!}</li>
						@endforeach
					</ul>
					@else
						{!! 'Khong co sinh vien' !!}
					@endif
				@endif
			</div>
		</div>
	</form>
</div>
@endsection