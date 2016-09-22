<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Domitory;
use App\School;
use App\Student;
use DB;

class DormitoryController extends Controller
{
    //
    public function getUpdate(){

    	return view('dormitory.update_student');
    }

    public function getSearch(){
    	return view('dormitory.search');
    }

    public function postSearch($data, Request $req){
    	if($_GET['student_id']){
    		$st = $_GET['student_id'];
    		$student = Student::where('code',$st)->first();
    		$school = DB::table('schools')->where('id', $student->school_id)->first();
    		$dormitory = Domitory::where('student_id',$student->id);

    		return view('dormitory.search', compact('student', 'school', 'dormitory'));
    	}
    }
}
