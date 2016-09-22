@if(isset($students))
	@foreach($students as $st)
		<ul>
			<li>{!! $st->student_id !!} đang ở nhà {!! $building->name !!}, phòng {!! $room->name !!}</li>
		</ul>
	@endforeach
@endif