Danh sách lớp:<br>
@if (!isset($_classes) || $_classes ==null)
					Chưa có lớp<br>
				@else			
					@foreach ($_classes as $_l)
								
						<a href="{{route('classes.studentlist', $_l->id )}}">
						
							{{ $_l->name}}
						</a><br>
											

						
					@endforeach					
				@endif


Sinh nhật bạn cùng lớp:<br>
@if (!isset($_classes) || $_classes ==null)
					Chưa có lớp:<br>
				@else			
					@foreach ($_classes as $l)
								
							<a href="{{route('classes.classmatersbirthday', $l->id )}}">{{ $l->name}}</a>	<br>
											

						
					@endforeach					
				@endif