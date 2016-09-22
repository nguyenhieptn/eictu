@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if($data)
	    @foreach($data as $want)
	    <div class="col-xs-12">
	      <p><a href="{{route('iwant.detail', $want['id'])}}" title="">{{$want['content']}}</a></p>
	      <hr>
	    </div>
	    @endforeach
	@else
		<p>Khong ai them muon gi ca luon day !</p>
	@endif    
  </div>
</div>
@endsection