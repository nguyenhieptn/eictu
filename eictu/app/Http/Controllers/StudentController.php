<?php

namespace App\Http\Controllers;

use App\Major;
use App\School;
use App\Student;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //

    public function get_id($masv){

    }

    public function vLogin()
    {
        return view("students.login");
    }

    public function login(Request $request)
    {
        $username =$request->input('username'); //Input::get('username');
        $password =$request->input('password'); //Input::get('password');

        if (auth()->attempt(['username' => $username, 'password' => $password])) {
            if (auth()->user()->type == 3) {
                $data = Student::select('*')
                    ->where('code', '=', auth()->user()->username)
                    ->get()->first();
                $classid = $data->class_id;
                $name = Auth::user()->name;
                return view("students.studentHomepage", compact('name', 'classid'));
            }
            else
                return redirect()->back()->with('global', 'Xin lỗi! bạn không phải sinh viên.');
        }
        return redirect()->back()->with('global', ' Tên đăng nhập hoặc mật khẩu không đúng.');
    }

    public function index()
    {
        if(!Auth::guest()) {
            $type = auth()->user()->type;

//        $type = Auth::user()->type;
            if ($type == 1) {
                $data = Student::select('*')->get();

                $stt = 1;
                return view("students.index", compact('data', 'stt'));
            } else if ($type == 3) {
                $data = Student::select('*')
                    ->where('code', '=', Auth::user()->username)
                    ->get()->first();
                $classid = $data->class_id;
                $name = Auth::user()->name;
                return view("students.studentHomepage", compact('name', 'classid'));
            }
        }else{
            return redirect('students/login');
        }
    }

    public function create()
    {
        $data = School::select('*')->get();
        $majors= Major::select('*')->get();
        return view('students.create',compact('data','majors'));
    }

    //add
    public function store(Request $request)
    {
        $data = array();
        $data['code']       = $request->input('Code');
        $data['name']       = $request->input('Name');
        $data['gender']     = $request->input('gender');
        $data['birthday']   = $request->input('Birthday');
        $data['major_id']   = $request->input('Major_Id');

        // lấy mã trường do quản trị viên quản lý
        $userid= Auth::user()->id;
        $school= School::where('user_id', $userid)->first();
        $data['school_id']  = $school->id;

        $this->validate($request, [
            'Code'    => 'required',
            'Name'    => 'required'
        ]);

        //add student

        $student = new Student();
        $student->code      = $data['code'];
        $student->name      = $data['name'];
        $student->gender    = $data['gender'];
        $student->birthday  = $data['birthday'];
        $student->major_id  = $data['major_id'];
        $student->class_id  = Null;
        $student->school_id =$data['school_id'];
        $student->save();
       if ($student->save() == true) {
           $user = new User();
           $user->name = $data['name'];
           $user->username = $data['code'];
           $user->email =$data['code']."@ictu.edu.vn";
           $user->type = 3;
           $user->password = bcrypt($data['code']);
           $user->save();
           return redirect("student");
       }
    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
