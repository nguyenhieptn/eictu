<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateSDRequest;
use App\Dormitory;
use App\School;
use App\Student;
use DB;
use Auth;

class DormitoryController extends Controller
{
    //
    public function getUpdate(){
       if(!Auth::guest()){
        if(Auth::user()->type == 3)
           return view('dormitory.update_student');
       }
       else
        return redirect('/search');
    }

    public function postUpdate(UpdateSDRequest $req){
        $data = $req->info;
        $date = $req->start_on;
        return "ok";
    }
    public function getSearch(){
    	return view('dormitory.search');
    }

    public function postSearch(){
    	if($_GET['student_id']){
    		$st = $_GET['student_id'];
    		$student = Student::where('code',$st)->first();
    		if($student == ""){
    			$none = "Không có kết quả";
    			return view('dormitory.search', compact('none'));
    		}
    		else{

	    		$school = DB::table('schools')->where('id', $student->school_id)->first();
	    		$dormitory = DB::table('dormitories')->where('student_id',$student->id)->first();
	    		if($dormitory == ""){
	    			$none = "Sinh viên này không ở KTX";
    				return view('dormitory.search', compact('none'));
	    		}
	    		else{
	    			$area = DB::table('areas')->where('id', $dormitory->area_id)->first();
	    			return view('dormitory.search', compact('student', 'school', 'dormitory', 'area'));
	    		}
	    	}
    	}
    }
}
