@extends('qlktx.app')
@section('title')
QLKTX
@endsection
@section('content')
<div id="lookup">
	<div class="col-md-6 col-md-offset-1">
		<div class="search">
			<form action="{!! url('get_results') !!}" id="fLookup" method="get" accept-charset="utf-8">
				{!! csrf_field() !!}
				<div class="form-group" id="lookup-group">
					<input type="text" name="masv" id="inputLookup" value="" class="form-control" placeholder="Nhập mã sinh viên...">
					<i class="fa fa-search fa-fw"></i>
				</div>

			</form>
		</div>
	</div>
	<div class="col-md-5">
		sdasdads
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
</div>
@endsection