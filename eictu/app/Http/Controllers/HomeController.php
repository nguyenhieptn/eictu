<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;// nhom classes
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Auth::user()->type;
        $name = Auth::user()->name;
        if ($type == 1){
            $name = Auth::user()->name;
            return view("schools.eICTuSchoolHomePage", compact('name'));
        }


        if ($type == 2) return route('teacher.index');
        if ($type == 3){
            $data = Student::select('*')
                ->where('code', '=', Auth::user()->username)
                ->get()->first();
            $classid = $data == null ? 0 : $data->class_id;
            return view("students.studentHomepage", compact('name', 'classid'));
        if ($type == 2) return view('teacher.homepage');

        if ($type == 3) {


            if ($type == 3) {
                $data = Student::select('*')
                    ->where('code', '=', Auth::user()->username)
                    ->get()->first();
                $classid = $data == null ? 0 : $data->class_id;
                return view("students.studentHomepage", compact('name', 'classid'));

            }

        }
    }
    }

}