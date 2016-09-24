@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
    	<div class="col-xs-6">
    		<h3><a href="{{route('iwant.status')}}" title="" style="color: #e74c3c;">SINH VIÊN CẦN TRỢ GIÚP KHẨN CẤP</a></h3>
    	</div>
  	</div>
  	<hr>
    <div class="row">
    	
	    <div class="col-md-12">
	    @if($data)
		    @foreach($data as $want)
		    <div class="col-xs-12">
		      <p><span class="glyphicon glyphicon-play" style="color: #27ae60;">&nbsp;</span><a href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
		      <hr>
		    </div>
		    @endforeach
		@else
			<p>Khong ai them muon gi ca luon day !</p>
		@endif 

		<div class="pagination pull-right">
	        <ul class="list-inline">
	        @if($data->currentPage() != 1)
	          <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()- 1)) !!}">Prev</a></li>
	        @endif  
	          @for($i =1; $i<= $data->lastPage(); $i++)
	          <li class="{!! ($data->currentPage() == $i) ? 'active' :'' !!}">
	            <a href="{!! str_replace('/?','?',$data->url($i)) !!}">{!!$i!!}</a>
	          </li>
	          @endfor
	        @if($data->currentPage() != $data->lastPage())  
	          <li><a href="{!! str_replace('/?','?',$data->url($data->currentPage()+ 1)) !!}">Next</a></li>
	        @endif
	        </ul>
	    </div>
		   
	  </div>
	</div>
</div>
@endsection