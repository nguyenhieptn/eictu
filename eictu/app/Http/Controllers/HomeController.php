<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $type= Auth::user()->type;
        $name= Auth::user()->name;
        if($type==1)        return view('home');
        if($type==2)        return view('teacher.homepage');
        if($type==3)        return view("students.studentHomepage", compact('name'));

    }
}
