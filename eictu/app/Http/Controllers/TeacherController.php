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
            'code'=>'required|max:30|unique:teacher,code',
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
            $user->email =$request->code."@ictu.edu.vn";
//             $user->type = 2;
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
    


}
