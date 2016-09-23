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
            $code = Auth::user()->username;
            $student = DB::table('students')->where('code', $code)->first();
            $school = DB::table('schools')->where('id', $student->school_id)->first();
            $dormitory = DB::table('dormitories')->where('student_id', $student->id)->first();
            $area = DB::table('areas')->where('id', $dormitory->area_id)->first();
            $str = "Phòng ".$dormitory->room.", Nhà ".$dormitory->building.', '.$area->name.', KTX '.$school->name;

            $date = date('d/m/Y',strtotime($dormitory->start_on));
           return view('dormitory.update_student', compact('str', 'date'));
       }
       else
        return redirect('/search');
    }

    public function postUpdate(UpdateSDRequest $req){
        $data = $req->info;
        $data = explode(',', $data);
        $date = date('Y-m-d',strtotime($req->start_on));
        $room = trim(str_replace('Phòng ', '', $data[0]));
        $building = trim(str_replace('Nhà ', '', $data[1]));
        $area = trim($data[2]);

        $code = Auth::user()->username;
        $student = DB::table('students')->where('code', $code)->first();
        $a = DB::table('areas')->where('name', $area)->first();
        $up = DB::table('dormitories')->where('student_id', $student->id)->update([
            'room' => $room,
            'building'=> $building,
            'area_id'=> $a->id
        ]);

        return redirect()->back()->with('msg', 'Cập nhật thành công!');
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

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
