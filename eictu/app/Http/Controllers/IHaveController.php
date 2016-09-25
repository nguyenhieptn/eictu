<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\IHave;
use App\Students;
use DB;
use App\Http\Requests;


class IHaveController extends Controller
{
    public function update()
    {
        if(isset(Auth::user()->username) && Auth::user()->type=="3") {
            return view('iHave.update');
        }else{
            echo '<script> alert("Bạn không phải là sinh viên");
                window.history.back();
            </script>';
        }
    }

    public function store(Request $request)
    {
        $data=array();
        $code=Auth::user()->username;
        $data['student_id']=DB::table('students')->where('code',$code)->value('id');
        $data['content'] = $request->input('content');
        $this->validate($request, [
            'content'=>'required|max:1000'
        ]);
        $have = new IHave();
        $have->student_id=$data['student_id'];
        $have->content=$data['content'];
        $have->save();
        return redirect("iHave");

        //$ihave = new IHave();
        //$ihave->content = $request->input('content');
        //->student_id       = 1;
        //$ihave->save();
        //return redirect()->route('iHave.search');
    }

    public function search()
    {
        $data = DB::table('have')->orderBy('id','desc')->paginate(6);
        return view("iHave.search",['data'=>$data]);

    }
    public function detail($id)
    {
        $student_id=DB::table('have')->where('id', $id)->value('student_id');
        $have  = DB::table('have')->where('id', $id)->value('content');
        $student = DB::table('students')->where('id', $student_id)->value('name');
        $address =DB::table('motels')->where('student_id', $student_id)->value('address');
        return view('iHave.detail', compact('have', 'student', 'address'));
    }
}
