<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Auth;

class ClassesController extends Controller
{
    
	// Liệt kê danh sách các lớp học
	function index()
	{
		$_classes =  DB::table('classes')
										->select('name','id')
										->orderBy('id', 'asc')
										->get();
										
		return view('classes.home',['_classes'=>$_classes]);
	}
	
	
	public function studentlist($classid)
	{
		if(!Auth::guest())
		{
			if(Auth::user()->type==1)
			{
				$_class= DB::table('classes')->select('name','id')
									->where('id', '=', $classid)
									->get()->first();	
		
				$_students =  DB::table('students')->select('code','name', 'birthday')
													->where('class_id', '=', $classid)
													->orderBy('code', 'asc')
													->paginate(100);	
				$_page = null;
				$_page = Input::get('page');	
				if($_page !=null && count($_page)>0)$_page = ($_page-1)*100;
					
				if($_class==null) return "The class is not available";
				return view('classes.studentlist',
												['_students' => $_students,
												'_class'=>$_class,
												'_page'=>$_page]
							);
			}else{
				return "You are not a Manager!Go out!";
			}
		}else{
			return redirect('schools/login');
		}
	}
	
	// tạo view trang phân lớp cho sinh viên
	function studentjoinclasspage($classid)	{
		
		if(!Auth::guest())
		{
			if(Auth::user()->type==1)
			{
				
				$data123 = DB::table('schools')->select('name','id')
                    ->where('user_id', '=', Auth()->user()->id)
                    ->get()->first();
				$sid = $data123->id;
			
				$_st=  DB::table('students')->select('students.code as studentcode','students.name as studentname', 'birthday','gender','majors.code as major_code')
				->leftjoin('majors', 'major_id', '=', 'majors.id')
				->where('class_id', '=', null)->get()->first();
				
				$_class= DB::table('classes')->select('name','id')->where('id', '=', $classid)->get()->first();			
				
				return view('classes.studentjoinclass',['_class'=>$_class,'_st'=>$_st,'_schoolid'=>$sid]);
			}else{
				return "Who are you?";
			}
		}else{
			return redirect('schools/login');
		}
					
		
	}
	
	function waitingstudentlist($classid)
	{
		
			$sid1=Input::get('schoolid');
			$rp=Input::get('rowperpage');
		
			$_class= DB::table('classes')->select('name','id')->where('id', '=', $classid)->get()->first();
			
			$_students =  DB::table('students')->select('students.code as studentcode',
			'students.name as studentname', 'birthday','gender','majors.code as major_code')
			->leftjoin('majors', 'major_id', '=', 'majors.id')
			->where('class_id', '=', null)
			->where('school_id','=',$sid1)
			->orderBy('students.code', 'asc')
			->paginate($rp);
			
			if(Request::ajax()){
				return response()->json(array(
								   'result'   => $_students->toArray()['data'], 
								   'pagination' => (string) $_students->links()
								) );
			}else{
				return view('classes.studentjoinclass',['_students' => $_students,'_class'=>$_class]);
			}	
		
			
		
		
	}
	
	function studentjoinclass($classid)
	{				
		$_code=Input::get('_code');
		DB::table('students')->where('code', $_code)->update(['class_id' => $classid]);
			
		return "sd";
		
	}		
		
	// Tìm các bạn sinh nhật trong 30 ngày tới
	function classmatersbirthday($classid)
	{	
		if(!Auth::guest())
		{
			if(Auth::user()->type==3)
			{
				$_st= DB::table('students')
				->select('name','class_id')->where('code', '=', Auth::user()->username)->get()->first();	
				$_classid = $_st->class_id;
				if($classid!=$_classid) 
					return "Xin lỗi ".Auth::user()->name." bạn không phải sinh viên lớp này";
				
				$_class= DB::table('classes')
				->select('name','id')->where('id', '=', $classid)->get()->first();	
				
				$begin_date=date('Y-m-d');
				$begin=explode("-", $begin_date);	
				
				$_students =  DB::table('students')->select('code','name', 'birthday','gender')->where('class_id', '=', $classid)
				->orderBy('code', 'asc')
				->get();
				$d="";
				for($i=0;$i<count($_students);$i++)
				{
					for($sn=1;$sn<31;$sn++)
					{
						$stop_date = date('Y-m-d', strtotime( "$begin_date + $sn day" ));
						
						$stop=explode("-", $stop_date);
						$nsn = explode("-", $_students[$i]->birthday);
						if($nsn[2]==$stop[2] && $nsn[1]==$stop[1])
						{
							$gt="Nam";
							if($_students[$i]->gender=="0")
							{
								$gt="Nữ";
							}
							$d[] = array(
										'name'=>$_students[$i]->name,
										'gender_text'=>$gt,
										'birthday'=>$nsn[2]."/".$nsn[1],
										'deadline'=>$sn." ngày nữa"
									);
						}
					}
				}
				return view('classes.classmatersbirthday',['_classmatersbirthday' => $d,'_class'=>$_class]);			
				
			}else{
				return "Who are you?";
			}
		}else{
			return redirect('login');
		}
		
	}
	public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
