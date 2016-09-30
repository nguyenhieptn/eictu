@extends('layouts.app')
@section('title')
    Danh sách Môn của ngành {{ $major->name }}
@endsection
@section('content')
    <div class="container">
        <header id="header" class="">

            <div class="header-content" style="color:white;font-weight: bold;font-size:20px;background:#3f83c0;height:50px;width:100%;padding: 10px;margin-left: 15px">
                <span   class="title">Chương trình đào tạo của ngành {{ $major->name }}</span>
            </div>
            <div class="header-content" style="color:black;font-weight: bold;font-size:18px;height:50px;width:100%;padding: 10px;margin-left: 15px">
                <span class="title"> Tổng chi phí (dự kiến) cho cả khóa học là: {{number_format($sum)}} VNĐ</span>
            </div>
        </header>
    </div>
    <div class="container">
        <div class="container">
            <table class="table-bordered" style="font-weight: bold">
                @if (count($programs) == 0 )
                    <tr>
                        <td align="left" class="col-md-1" colspan="12">
                            Chưa có Môn
                        </td>
                    </tr>
                @else
                    <tr>
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
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
@endsection

