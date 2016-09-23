@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Danh sách giáo viên</div>
                    <div class="panel-body">
                        <h2><a href="{{ route('teacher.add') }}">THÊM GIÁO VIÊN VÀO TRƯỜNG</a></h2>

                        
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã giáo viên</th>
                                <th>Họ tên giáo viên</th>
                                <th>Ngành</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @forelse ($teacher as $item_teacher)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $item_teacher->code }}</td>
                                    <td>{{ $item_teacher->name }}</td>
                                    <td>
                                    	<?php 
                                    		$major_name = DB::table('majors')->where('id',$item_teacher->major_id )->first();
                                    	 ?>
                                    	 {{$major_name->name}}
                                    </td>
                                    <td>
	                                    @if($item_teacher->gender == 0)
	                                    	Nam
	                                    @else
	                                    	Nữ
	                                    @endif
                                    </td>
                                    <td>{{ date("d-m-Y",strtotime($item_teacher->birthday)) }}</td>
                                </tr>
                            @empty
                                <p>Không có giáo viên nào trong trường</p>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination pull-right">
                    <ul class="list-inline">
                    @if($teacher->currentPage() != 1)
                      <li><a href="{!! str_replace('/?','?',$teacher->url($teacher->currentPage()- 1)) !!}">Prev</a></li>
                    @endif  
                      @for($i =1; $i<= $teacher->lastPage(); $i++)
                      <li class="{!! ($teacher->currentPage() == $i) ? 'active' :'' !!}">
                        <a href="{!! str_replace('/?','?',$teacher->url($i)) !!}">{!!$i!!}</a>
                      </li>
                      @endfor
                    @if($teacher->currentPage() != $teacher->lastPage())  
                      <li><a href="{!! str_replace('/?','?',$teacher->url($teacher->currentPage()+ 1)) !!}">Next</a></li>
                    @endif
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
@endsection