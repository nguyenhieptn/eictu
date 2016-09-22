<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Teacher;
use App\Http\Requests;

class TeacherController extends Controller
{
    public function index(){
    	# code...
    	return view('teacher.homepage');
    }

    public function getAdd(){
    	# code...
    	return view('teacher.add');
    }


    public function postAdd(){
    	# code...
    }

    public function getList(){
    	return view('teacher.list');
    }
}
