<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class QLLopHoc extends Controller
{
    //
	public function dssv($idlop)
	{
		$dslop =  DB::table('tbl_lophoc')->select('tenlop','id as lopid')->get();
		$lop= DB::table('tbl_lophoc')->select('tenlop','id as lopid')->where('id', '=', $idlop)->get()->first();	
		$sinhviens =  DB::table('tbl_sinhvien')->select('masv','hoten', 'ngaysinh')
		->where('id_lop', '=', $idlop)
		->orderBy('masv', 'asc')
		->paginate(100);		
		return view('quanlylophoc.dssvtronglop',['sinhviens' => $sinhviens,'lop'=>$lop,'dslop'=>$dslop]);
	}
	
	// Liệt kê danh sách các lớp học
	function index()
	{
		
	}
	function trangchu()
	{
		$lops =  DB::table('tbl_lophoc')
		->select('tenlop','id as lopid')
		->orderBy('id', 'asc')
		->get();
		return view('quanlylophoc.trangchu',['dslop'=>$lops]);
	}
	// tạo view trang phân lớp cho sinh viên
		function trangphanlop($idlop)
		{
			
			$lop= DB::table('tbl_lophoc')->select('tenlop','id as lopid')->where('id', '=', $idlop)->get()->first();
			
			
			return view('quanlylophoc.phanlop',['lop'=>$lop]);
			
			
		}
		function bangsvmoi($idlop)
		{
			$rp=Input::get('rowperpage');
			$lop= DB::table('tbl_lophoc')->select('tenlop','id as lopid')->where('id', '=', $idlop)->get()->first();
			$sinhviens =  DB::table('tbl_sinhvien')->select('masv','hoten', 'ngaysinh','gioitinh','manganh')
			->join('tbl_nganhhoc', 'id_nganh', '=', 'tbl_nganhhoc.id')
			->where('id_lop', '=', null)
			->orderBy('masv', 'asc')
			->paginate($rp);
			
			if(Request::ajax()){
				return response()->json(array(
                                   'result'   => $sinhviens->toArray()['data'], 
                                   'pagination' => (string) $sinhviens->links()
                                ) );
			}else{
				return view('quanlylophoc.phanlop',['sinhviens' => $sinhviens,'lop'=>$lop]);
			}
			
			
		}
		function phanlop($idlop)
		{
			//$dslop =  DB::table('lop')->select('tenlop','lopid')->get();
			//$sinhviens =  DB::table('sinhvien')->select('masv','hoten', 'ngaysinh')->where('lopid', '=', null)->get();
			//return view('layoutQLLH.phanlop',['sinhviens' => $sinhviens,'dslop'=>$dslop]);
			
			//$idlop = Input::get('phanlopid');
			
				$masv=Input::get('masv');
				DB::table('tbl_sinhvien')
					->where('masv', $masv)
					->update(['id_lop' => $idlop]);
					
				return "sd";
			
		}
		
		
		//function dssvHBBD($idlop,$hbbd) tìm các bạn sinh viên sẽ sinh nhật trong 30 ngày tới
		function sinhnhatbancunglop($idlop)
		{
			
			$dslop =  DB::table('tbl_lophoc')->select('tenlop','id as lopid')->get();
			$lop= DB::table('tbl_lophoc')->select('tenlop','id')->where('id', '=', $idlop)->get()->first();	
			
			$begin_date=date('Y-m-d');
			$begin=explode("-", $begin_date);	
			
			$sv =  DB::table('tbl_sinhvien')->select('masv','hoten', 'ngaysinh','gioitinh')->where('id_lop', '=', $idlop)
			->orderBy('masv', 'asc')
			->get();
			$d="";
			for($i=0;$i<count($sv);$i++)
			{
				for($sn=1;$sn<31;$sn++)
				{
					$stop_date = date('Y-m-d', strtotime( "$begin_date + $sn day" ));
					
					$stop=explode("-", $stop_date);
					$nsn = explode("-", $sv[$i]->ngaysinh);
					if($nsn[2]==$stop[2] && $nsn[1]==$stop[1])
					{
						$d[] = array(
									'hoten'=>$sv[$i]->hoten,
									'gioitinh'=>$sv[$i]->gioitinh,
									'ns'=>$nsn[2]."/".$nsn[1],
									'songay'=>$sn." ngày nữa"
								);
					}
				}
			}
			return view('quanlylophoc.dssvHBBD',['bansinhnhat' => $d,'lop'=>$lop,'dslop'=>$dslop]);			
			
		}
}
