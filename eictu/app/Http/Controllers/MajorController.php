<?php

/**
 * Created by PhpStorm.
 * User: Optimus
 * Date: 16/09/21
 * Time: 18:58
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;


class MajorController extends Controller
{
    public function index()
    {
        //echo "hallo I'm index";
        $_majors = DB::table('majors')
            ->select('id', 'code', 'name')
            ->get();

        return view('major.index', ['_majors' => $_majors]);

        //return view("major.index");
    }

    public function create()
    {

        return view("major.create");
    }

    public function createmajor()
    {
        DB::table('majors')
            ->insert(['code' => Input::get('code'), 'name' => Input::get('name')]);
        //return Input::get('code');
        $_majors = DB::table('majors')
            ->select('id', 'code', 'name')
            ->get();

        return view('major.index', ['_majors' => $_majors]);
    }

    public function createsubject($majorid)
    {
        $id = $majorid;
        return view("major.createsubject")->with('id', $id);
    }

    public function createsubjectpost($majorid)
    {
       // echo $majorid;
        DB::table('studyprograms')
            ->insert(['code' => Input::get('code'), 'name' => Input::get('name'), 'term' => Input::get('term'),
                'credit' => Input::get('credit'), 'major_id' => Input::get('major_id')]);

        //return Input::get('code');
        $_major = DB::table('majors')
            ->select('id', 'name')
            ->get()->first();

        $_programs = DB::table('studyprograms')
            ->select('code', 'name', 'term', 'credit')
            ->where('major_id', $majorid)
            ->get();

        return view("major.subjects", ['programs' => $_programs, 'major' => $_major]);
        //return view("major.subjects");
    }

    public function subject($subid)
    {
        //echo $subid;
        $_major = DB::table('majors')
            ->select('id', 'name')
            ->where('id', $subid)
            ->get()->first();

        $_programs = DB::table('studyprograms')
            ->select('code', 'name', 'term', 'credit')
            ->where('major_id', $subid)
            ->get();
        //if ($_major == null) return "The class is not available";
        //return Input::get('code');
        return view('major.subjects', ['programs' => $_programs, 'major' => $_major]);
        //return view('major.subjects', ['programs' => $_programs]);

    }
}