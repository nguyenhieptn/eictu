<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LMSController extends Controller
{
     public function getshow()
    {
    	return view('LMS.show');

    }

    public function getupdate()
    {
    	return view('LMS.update');
    }
}
