<?php

namespace App\Http\Controllers;

use App\Major;
use App\School;
use App\Student;
use Illuminate\Http\Request;

use App\Http\Requests;

class StudentController extends Controller
{
    //

    public function get_id($masv){

    }

    public function index()
    {
        $data = Student::select('*')->get();
       // return view('iWant.eICTuStudentDemandSearch', compact('data'));
//        DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.id', 'contacts.phone', 'orders.price')
//            ->get();
        return view("students.index", compact('data'));
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
        $data['school_id']  = $request->input('school_id');
       // echo  $data['code'] ;
      //  echo   "\nho ten :".$data['name'] ;

        $this->validate($request, [
            'Code'    => 'required',
            'Name'    => 'required'
        ]);

        //validation laravel

        $student = new Student();
        $student->code      = $data['code'];
        $student->name      = $data['name'];
        $student->gender    = $data['gender'];
        $student->birthday  = $data['birthday'];
        $student->major_id  = $data['major_id'];
        $student->class_id  = Null;
        $student->school_id =$data['school_id'];
        $student->save();

       return redirect("student");
    }
}
