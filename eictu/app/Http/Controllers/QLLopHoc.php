<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class QLLopHoc extends Controller
{
    //
	public function dssv($lopid)
	{
		$dslop =  DB::table('lop')->select('tenlop','lopid')->get();
		$lop= DB::table('lop')->select('tenlop','lopid')->where('lopid', '=', $lopid)->get()->first();	
		$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')->where('lopid', '=', $lopid)->paginate(15);		
		return view('quanlylophoc.dssvtronglop',['sinhviens' => $sinhviens,'lop'=>$lop,'dslop'=>$dslop]);
	}
	
	// Liệt kê danh sách các lớp học
	function index()
	{
		$lops =  DB::table('lop')->select('tenlop','lopid')->get();
		return view('quanlylophoc.trangchu',['dslop'=>$lops]);
	}
	function trangchu()
	{
		$lops =  DB::table('lop')->select('tenlop','lopid')->get();
		return view('quanlylophoc.trangchu',['dslop'=>$lops]);
	}
	// tạo view trang phân lớp cho sinh viên
		function trangphanlop($lopid)
		{
			$lop= DB::table('lop')->select('tenlop','lopid')->where('lopid', '=', $lopid)->get()->first();
			$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')->where('lopid', '=', null)->paginate(5);	
			return view('quanlylophoc.phanlop',['sinhviens' => $sinhviens,'lop'=>$lop]);
			
		}
		function phanlop($lopid,$masv)
		{
			//$dslop =  DB::table('lop')->select('tenlop','lopid')->get();
			//$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')->where('lopid', '=', null)->get();
			//return view('layoutQLLH.phanlop',['sinhviens' => $sinhviens,'dslop'=>$dslop]);
			
			//$lopid = Input::get('phanlopid');
			
				DB::table('sinhvien')
					->where('masv', $masv)
					->update(['lopid' => $lopid]);
			
			return Redirect::back()->with('msg', 'Phân lớp xong');
		}
		
		
		
		//function dssvHBBD($lopid,$hbbd) tìm các bạn sinh viên sẽ sinh nhật trong 30 ngày tới
		function sinhnhatbancunglop($lopid)
		{
			
			$dslop =  DB::table('lop')->select('tenlop','lopid')->get();
			$lop= DB::table('lop')->select('tenlop','lopid')->where('lopid', '=', $lopid)->get()->first();	
			
			$begin_date=date('Y-m-d');
			$stop_date = date('Y-m-d', strtotime( "$begin_date + 30 day" ));
			$begin=explode("-", $begin_date);
			$stop=explode("-", $stop_date);
			
			if($begin[1]==$stop[1])
			{
				//tim trong mot thang
				
				$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')->where('lopid', '=', $lopid)
							->where(function ($query)use ($begin,$stop) {
								$query->whereDay('ngaysinh', '>=', $begin[2])
									  ->whereMonth('ngaysinh', '=', $begin[1]);
							})->paginate(5);
				return view('quanlylophoc.dssvHBBD',['sinhviens' => $sinhviens,'lop'=>$lop,'dslop'=>$dslop]);
				
			}elseif($begin[1]==$stop[1]-1 ||$begin[1]==12 && $stop[1]==1 )
			{
				// tim trong doan 2 thang ke tiep				
								
				$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')
				->where(function ($query) use ($lopid,$begin,$stop){
							$query->whereMonth('ngaysinh', '=', $begin[1])
									->whereDay('ngaysinh', '>=', $begin[2])								
									->where('lopid', '=', $lopid);
						})
				->orwhere(function ($query) use ($lopid,$begin,$stop){
														
									$query->whereMonth('ngaysinh', '=', $stop[1])						
									->whereDay('ngaysinh', '<=', $stop[2])							
									->where('lopid', '=', $lopid);
						})
				->paginate(5);
				
				return view('quanlylophoc.dssvHBBD',['sinhviens' => $sinhviens,'lop'=>$lop,'dslop'=>$dslop]);
				
			}else
			{
				//Tim trong 3 thang
				$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')
				->where(function ($query) use ($lopid,$begin,$stop){
							$query->where('lopid', '=', $lopid)
									->whereMonth('ngaysinh', '=', $begin[1])
									->whereDay('ngaysinh', '>=', $begin[2]);
						})
				->orwhere(function ($query) use ($lopid,$begin,$stop){								
									$query->where('lopid', '=', $lopid)
									->whereMonth('ngaysinh', '=', $stop[1])								
									->whereDay('ngaysinh', '<=', $stop[2]);
						})
				->orwhere(function ($query) use ($lopid,$begin,$stop){														
									$query->where('lopid', '=', $lopid)
									->whereMonth('ngaysinh', '=', $stop[1]-1);
						})						
				->paginate(5);
				
				return view('quanlylophoc.dssvHBBD',['sinhviens' => $sinhviens,'lop'=>$lop,'dslop'=>$dslop]);
			}
		}
}
