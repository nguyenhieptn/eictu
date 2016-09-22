<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Major;
use App\Teacher;
use App\Http\Requests;

class TeacherController extends Controller
{
    public function index(){
    	# code...
    	return view('teacher.homepage');
    }

    public function getAdd(){
        $major = Major::select('*')->get()->toArray();
    	return view('teacher.add', compact('major'));

    }


    public function postAdd(Request $request){
        $teaher = new Teacher();
        $teaher->code = $request->code;
        $teaher->name = $request->name;
        $teaher->gender = $request->gender;
        //$teaher->major_id = $request->major;

        $teaher->save();
        return "ok";
    }

    public function getList(){
    	return view('teacher.list');
    }
}
