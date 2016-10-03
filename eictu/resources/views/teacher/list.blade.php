@extends('layouts.school_app')
@section('title')
Danh sách giáo viên
@endsection
@section('content')
<script type="text/javascript">
           function myFunction() {
                var r = confirm("Bạn có chắc chắn muốn xóa không !");
                if (r == true) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"</div>
                    <div class="panel-body">
                    @if(Auth::check() && Auth::user()->type==1)
                        <h2><a class="btn btn-success" href="{{ route('teacher.add') }}">THÊM GIÁO VIÊN VÀO TRƯỜNG</a></h2>
                    @endif
                        
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã giáo viên</th>
                                <th>Họ tên giáo viên</th>
                                <th>Ngành</th>
                                <th>Giới tính</th>
                                @if(Auth::check() && Auth::user()->type==1)
                                <th>Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                            @if($teacher)
                                @foreach ($teacher as $item_teacher)
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
                                        @if(Auth::check() && Auth::user()->type==1)
                                       <td><a onclick="return myFunction()" style="color: red;" href="{{URL::route('teacher.delete', $item_teacher->id)}}" title="">Xóa</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            @else
                                <p>Không có giáo viên nào trong trường</p>
                            @endif

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
