@if(isset($rooms))
	<option>-- Chọn phòng ---</option>
	@foreach($rooms as $r)
	<option value="{!! $r->id !!}">{!! $r->name !!}</option>
	@endforeach
@endif