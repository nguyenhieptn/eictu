@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-lg-6 col-xs-12">
      <form action="{{route('iwant.status')}}" role="form" method="post" accept-charset="utf-8">
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <div class="form-group {{$errors->has('status')? ' has-error': ''}}">
          <textarea placeholder="What do you want ?" name="content" class="form-control" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Update Status</button>    
      </form>
      <hr>
    </div>
  </div>
</div>
@endsection
