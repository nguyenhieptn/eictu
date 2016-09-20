<?php

namespace App\Http\Controllers\QLKTX;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SinhvienKTXController extends Controller
{
    //
    public function getSearch(){
    	return view('qlktx.search');
    }
}
