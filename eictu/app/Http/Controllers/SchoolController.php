<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::with('manager')->get();

        return view("schools.index")->with('schools',$schools);
    }

    public function create()
    {
        return view('schools.create');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['name'] = $request->input('name');
        $data['code'] = $request->input('code');
        $data['user_id'] = $request->input('user_id');

        $this->validate($request, [
            'name'    => 'required',
            'code'    => 'required',
            'user_id' => 'required'
        ]);

        //validation laravel

        $school = new School();
        $school->name = $data['name'];
        $school->code = $data['code'];
        $school->user_id = $data['user_id'];
        $school->save();

        return redirect("schools");
    }
}
