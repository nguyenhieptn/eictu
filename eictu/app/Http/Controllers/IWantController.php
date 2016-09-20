<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IWantController extends Controller
{
    public function index()
    {
    	return view('iWant.eICTuStudentDemandUpdate');
    }
    public function search()
    {
    	return view('iWant.eICTuStudentDemandSearch');
    }
    public function detail()
    {
    	return view('iWant.eICTuStudentDemandDetail');
    }
}
