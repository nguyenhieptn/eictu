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
<<<<<<< HEAD
        <textarea placeholder="Gõ bản tin đề nghị giúp đỡ của bạn vào đây…Chúc bạn may mắn!" name="content" class="form-control" rows="3">{!!$data['content']!!}</textarea>
      </div>
      <div class="form-group">
        <input type="text" name="location" value="{!!$data['location']!!}" class="form-control" placeholder="Vị trí hiện tại của bạn">
=======
        <textarea placeholder="Gõ bản tin đề nghị giúp đỡ của bạn vào đây…Chúc bạn may mắn!" name="content" class="form-control" rows="3">{!!old('content', isset($data) ? $data['content']:null) !!}</textarea>
      </div>
      <div class="form-group">
        <input type="text" name="location" value="{!!old('location', isset($data) ? $data['location']:null) !!}" class="form-control" placeholder="Vị trí hiện tại của bạn">
>>>>>>> bf01f78c567d7dd9b7fd34cb0803d9e60ac04170
      </div>
      <p><span>Bạn cần trợ giúp khẩn cấp? Hãy đăng tin lên ngay để bạn bè của bạn biét tin giúp đỡ.</span></p>
      <button type="submit" class="btn btn-success">Sửa bài</button>    
    </form>
  </div>
</div>
@endif
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> bf01f78c567d7dd9b7fd34cb0803d9e60ac04170
