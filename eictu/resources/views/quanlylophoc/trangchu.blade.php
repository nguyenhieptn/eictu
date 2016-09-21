Danh sách lớp:<br>
@if (!isset($dslop) || count($dslop) === 0)
					Chưa có lớp<br>
				@else			
					@foreach ($dslop as $lop1)
								
							<a href="{{ URL::to('/qllh/dssv/') }}/{{ $lop1->lopid }}">{{ $lop1->tenlop}}</a>	<br>
											

						
					@endforeach					
				@endif


Sinh nhật bạn cùng lớp:<br>
@if (!isset($dslop) || count($dslop) === 0)
					Chưa có lớp:<br>
				@else			
					@foreach ($dslop as $lop1)
								
							<a href="{{ URL::to('/qllh/sinhnhat') }}/{{ $lop1->lopid }}">{{ $lop1->tenlop}}</a>	<br>
											

						
					@endforeach					
				@endif