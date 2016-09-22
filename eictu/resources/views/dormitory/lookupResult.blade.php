@if(isset($student))
	@foreach($student as $st)
		<ul>
			<li>
			{!! $st->student_id !!} đang ở nhà 
			<?php $room = DB::table('tbl_phong_ktx')->where('id', $st->room_id)->first(); ?>
			<?php $building = DB::table('tbl_khunha_ktx')->where('id', $room->building_id)->first(); ?>
			{!! $building->name !!}
			phòng
			{!! $room->name !!}
			</li>
		</ul>
	@endforeach
@endif