<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DormitoryController extends Controller
{
    //
    public function getUpdate(){

    	return view('dormitory.update_student');
    }

    public function getSearch(){
    	return view('dormitory.search');
    }
}
