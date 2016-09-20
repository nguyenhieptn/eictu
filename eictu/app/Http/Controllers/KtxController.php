<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class KtxController extends Controller
{
    //
    public function getSearch(){

    	return view('qlktx.search');
    }

}
