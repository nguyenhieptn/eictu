<?php

namespace App\Http\Controllers\FindJob;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FindJobControler extends Controller
{
  public function getIndex()
  {
  	return view('findjob.index');
  }

  public function getPost()
  {
  	return view('findjob.add');
  }

  public function getDetail()
  {
  	return view('findjob.detail');
  }
  
}
