@extends('layouts.student_app')
@section('title')
Sửa bài đăng
@endsection
@section('content')
@if($data)
<div class="row">
  <div class="col-lg-8 col-xs-12">
    <form action="" role="form" method="post" accept-charset="utf-8">
      <input type="hidden" name="_token" value="{{Session::token()}}">
      <div class="form-group {{$errors->has('content')? ' has-error': ''}}">
        <textarea placeholder="Gõ bản tin đề nghị giúp đỡ của bạn vào đây…Chúc bạn may mắn!" name="content" class="form-control" rows="3">{!!$data['content'] !!}</textarea>
      </div> 
      <div class="form-group">
        <input type="text" name="location" value="{!!old('location', isset($data) ? $data['location']:null) !!}" class="form-control" placeholder="Vị trí hiện tại của bạn">
      </div>
      <p><span>Bạn cần trợ giúp khẩn cấp? Hãy đăng tin lên ngay để bạn bè của bạn biét tin giúp đỡ.</span></p>
      <button type="submit" class="btn btn-success">Sửa bài</button>    
    </form>
  </div>
</div>
@endif
@endsection
