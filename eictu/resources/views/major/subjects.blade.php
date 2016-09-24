@extends('layouts.app')
@section('title')
    Danh sách Môn của ngành {{ $major->name }}
@endsection
@section('content')
    <div class="container">
        <header id="header" class="">
            <div class="header-content" style="color:white;font-weight: bold;font-size:24px;background:#3bc037;height:50px;width:100%;padding: 10px;margin-left: 13px">
                <span   class="title">eICTuMajorEducationProgram - Chương trình đào tạo của ngành {{ $major->name }}</span>
            </div>
        </header>
    </div>
    <div class="container">
        <div style="padding:5px;font-size:20px;font-weight: bold;height:45px;width:100%;padding-left: 5px;margin-left: 13px;font-weight: bold">
		<span style="display:inline;border:0px solid red;margin:0; padding:0px 0px;">
			<img src="{!! url('classes_src/images/li.png')!!}"/>
		</span>
            <span style="display:inline;border:0px solid red;margin:0; padding:0px 0px">
				<a href="{{ url("major/createsubject/{$major->id}")}}">
					Tạo Môn Mới
				</a>
	   </span>
        </div>

        <div class="container">
            <table class="table-bordered" >
                @if (count($programs) == 0 )
                    <tr style="font-weight: bold">
                        <td align="left" class="col-md-1" colspan="12">
                            Chưa có Môn
                        </td>
                    </tr>
                @else
                    <tr >
                        <th class="col-md-2">
                            Mã Môn
                        </th>
                        <th class="col-md-6">
                            Tên Môn
                        </th>
                        <th class="col-md-3">
                            Kỳ Học Dự Kiến
                        </th>
                        <th class="col-md-2">
                            Số Tín Chỉ
                        </th>
                        <th class="col-md-2">
                            Số Tiết học
                        </th>
                    </tr>
                    @foreach ($programs as $sub)
                        <tr>
                            <td class="col-md-1">
                                {{ $sub->code }}
                            </td>
                            <td class="col-md-5">
                                {{ $sub->name }}
                            </td>
                            <td class="col-md-2">
                                {{ $sub->term }}
                            </td>
                            <td class="col-md-3">
                                {{ $sub->credit }}
                            </td>
                            <td class="col-md-3">
                                {{ $sub->credit*15 }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection

