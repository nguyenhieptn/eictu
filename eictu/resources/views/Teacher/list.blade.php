@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Giao Vien</div>
                    <div class="panel-body">
                        <a href="{{ route('teacher.add') }}">Them giao vien</a>

                        <h2>Danh sach giao vien</h2>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Nganh</th>
                                <th>Gioi tinh</th>
                                <th>Sinh Nhat</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($teacher as $item_teacher)
                                <tr>
                                    <td>{{ $item_teacher->code }}</td>
                                    <td>{{ $item_teacher->name }}</td>
                                    <td>
                                    	<?php 
                                    		$major_name = DB::table('majors')->where('id',$item_teacher->id )->first();
                                    	 ?>
                                    	 {{$major_name->name}}
                                    </td>
                                    <td>
	                                    @if($item_teacher->gender == 0)
	                                    	Nu
	                                    @else
	                                    	Nam
	                                    @endif
                                    </td>
                                    <td>{{ date("d-m-Y",strtotime($item_teacher->birthday)) }}</td>
                                </tr>
                            @empty
                                <p>No item_teacher</p>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection