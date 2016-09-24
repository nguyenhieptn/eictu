<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Major;
use App\User;
use App\Teacher;
use App\Http\Requests;

class TeacherController extends Controller
{

    public function index(){
    	// $teacher = Teacher::select('name')->where('code', Auth::user()->username)->first();
       

          return view('teacher.homepage');
       

          // return view('teacher.homepage');
        if ( Auth::user()->type <= 2) {
            return view('teacher.homepage');
        }else{
            return view('student.index');
        }
    	
    }

    public function getAdd(){
        //  if ( Auth::user()->type == 1) {
        //     $major = Major::select('*')->get()->toArray();
        //     return view('teacher.add', compact('major'));
        //  }elseif(Auth::user()->type == 2){
            
        //  }else{
        //     return view('welcome');
         
        // }
        $major = Major::select('*')->get()->toArray();
            return view('teacher.add', compact('major'));
    }


    public function postAdd(Request $request){

        $this->validate($request, [
            'code'=>'required|max:30',
            'name'=>'required|max:30',
            'gender'=>'required',
            'birthday'=>'required',
            'major'=>'required',
            ]);
        $teaher = new Teacher();
        $teaher->code = $request->code;
        $teaher->name = $request->name;
        $teaher->gender = $request->gender;
        $teaher->birthday = $request->birthday;
        $teaher->major_id = $request->major;
        $teaher->save();
        if ($teaher->save() == true) {
            $user = new User();
            $user->name = $request->name;
            $user->username = $request->code;
            $user->email =changeName($request->name)."@ictu.edu.vn";
            $user->type = 2;
            $user->password = bcrypt($request->code);
            $user->save();
        }
        return redirect()->route('teacher.list');
    }

    public function getList(){
        
            $teacher = Teacher::orderBy('id', 'DESC')->paginate(20);
            // print_r($teacher);
            return view('teacher.list', compact('teacher'));
        
        }
        
    public function getLogin(){
        if (isset(Auth::user()->id) && Auth::user()->type==1) {
            return redirect()->route('teacher.list');
        }elseif (isset(Auth::user()->id) && Auth::user()->type==2) {
            return redirect()->route('teacher.index');
        }elseif (isset(Auth::user()->id) && Auth::user()->type==3) {
            return view('welcome');
        }else{
            return view('teacher.login');
        }
        
    }
    
    function stripUnicode($str){
		# code...
		if (!$str) {
			return false;
		}
		$unicode = array(
			'a'=>'à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ',
			'A'=>'Á|À|Â|Ä|Ă|Ā|Ã|Å|Ą|Ạ|Ă|Ẳ|Ằ|Ắ|Ặ|Ẵ|Ấ|Ầ|Ẩ|Ậ|Ẫ',
			'AE'=>'Æ',
			'd'=>'đ',
			'D'=>'Đ',
			'E'=>'É|È|Ė|Ễ|Ế|Ề|Ệ|Ể|Ẻ|Ẹ|Ê|Ë|Ě|Ē|Ę|Ə',
			'e'=>'è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ',
			'i'=>'í|ì|i|î|ï|ī|į|ỉ|ị|ĩ',
			'I'=>'|Í|Ị|Ì|Ỉ|Ĩ|',
			'o'=>'ó|ò|ỏ|ọ|ó|ồ|ố|ô|ộ|ổ|ö|õ|ő|ø|ơ|œ|ơ|ờ|ở|ợ|ỡ|ớ|ộ',
			'O'=>'Ó|Ò|Ô|Ö|Õ|Ő|Ø|Ơ',
			'u'=>'ú|ù|ủ|ụ|û|ü|ŭ|ū|ů|ų|ű|ư|ừ|ử|ữ|ự|ứ',
			'U'=>'Ú|Ù|Û|Ü|Ŭ|Ū|Ů|Ų|Ű|Ư|Ụ|Ứ|Ừ|Ử|Ự|Ữ',
			'y'=>'ý|ý|ỵ|ỷ|ỹ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỵ|Ỹ'
			);
		foreach ($unicode as $khongdau => $codau) {
			$arr=explode("|", $codau);
			$str=str_replace($arr, $khongdau, $str);
		}
		return $str;
	}
	function changeName($str){
		$str=trim($str);
		if ($str=="") {
			return "";
		}
		$str=str_replace('"', '', $str);
		$str=str_replace("'", '', $str);
		$str=stripUnicode($str);
		$str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
		$str=str_replace(' ', '', $str);
		return $str;

	}


}
