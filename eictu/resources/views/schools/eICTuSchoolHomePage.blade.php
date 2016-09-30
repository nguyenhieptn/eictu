@extends('layouts.school_app')

@section('title')
    Khai Báo Ngành Học Mới
@endsection
@section('content')
    <div >
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div >


                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    Hiển thị nội dung giới thiệu về trường ở đây. Hiển
                    thị nội dung giới thiệu về trường ở đây.Hiển thị nội
                    dung giới thiệu về trường ở đây.Hiển thị nội dung
                    giới thiệu về trường ở đây.Hiển thị nội dung giới
                    thiệu về trường ở đây.Hiển thị nội dung giới thiệu về
                    trường ở đây.
                </div>
            </div>
        </div>
    </div>
@endsection
