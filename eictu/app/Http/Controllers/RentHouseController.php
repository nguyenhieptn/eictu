<?php

namespace App\Http\Controllers;

use App\RentHouse;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginato;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class RentHouseController extends Controller
{
    //
    public function index(Request $request)
    {
        $code = $request->input('code');
        $student_id = DB::table('students')->where('code', $code)->value('id');
        $data = DB::table('motels')->where('student_id', $student_id)->paginate(5);
        return view("rentHouse.index", ['data' => $data]);
    }

    public function create(){
       // if(Auth::attempt(['username' => $username, 'password' => $password], 'type'=>'1'))
        if(isset(Auth::user()->user_id) && Auth::user()->type=="3") {
            $student_id = Auth::user()->user_id;
            $data = DB::table('motels')->where('student_id', $student_id)->orderBy('id', 'desc')->paginate(5);
            return view("rentHouse.create", ['data' => $data]);
        }else{
            echo '<script> alert("Bạn không phải là sinh viên");
                window.history.back();
            </script>';
        }
    }

    public function store(Request $request){
        $data=array();
        $data['student_id']=$request->input('student_id');
        $data['hostess'] = $request->input('hostess');
        $data['address'] = $request->input('address');
        $data['date_join'] = $request->input('date_join');

        $this->validate($request,[
            'hostess'=>'required',
            'address'=>'required',
            'date_join'=>'required'
        ]);
        $renthouse = new RentHouse();
        $renthouse->student_id=$data['student_id'];
        $renthouse->hostess=$data['hostess'];
        $renthouse->address=$data['address'];
        $renthouse->date_join=$data['date_join'];
        $renthouse->save();
        $student_id=1;
        $data=DB::table('motels')->where('student_id',$student_id) ->orderBy('id', 'desc')->lim(3);
        return view("rentHouse.create",['data'=>$data]);
    }
}
