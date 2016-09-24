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
<<<<<<< HEAD
        $type = Auth::user()->type;
        $name = Auth::user()->name;
        if ($type == 1) return view('home');
        if ($type == 2) return view('teacher.homepage');
        if ($type == 3) {
=======
        $type= Auth::user()->type;
        $name= Auth::user()->name;
        if($type==1)        return view('home');
        if($type==2)        return redirect()->route('teacher.index');
        if($type==3)
        {
>>>>>>> 45c9f53b9ac6b62c66a2f5166fc466a863c5c2b7
            $data = Student::select('*')
                ->where('code', '=', Auth::user()->username)
                ->get()->first();
            $classid = $data == null ? 0 : $data->class_id;
            return view("students.studentHomepage", compact('name', 'classid'));

        }

    }
}
