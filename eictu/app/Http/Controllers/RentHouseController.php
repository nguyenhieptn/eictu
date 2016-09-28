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
    public function index()
    {
        $code = auth()->user()->username;
        $student_id = DB::table('students')->where('code', $code)->value('id');
        $data = DB::table('motels')->where('student_id', $student_id)->orderBy('date_join', 'desc')->paginate(5);
        return view("RentHouse.index", ['data' => $data]);
    }
    public function search(Request $request)
    {
        $code = $request->input('code');
        $data=array();
        $student=array();
        if($code!=null) {
            $student = DB::table('students')->where('code', $code)->first();
            $data = DB::table('motels')->where('student_id', $student->id)->orderBy('date_join', 'desc')->paginate(5);
        }
        return view("RentHouse.search", ['data' => $data,'student'=>$student]);
    }

    public function create(){
        if(auth()->guest()){
            echo '<script> alert("Bạn chưa đăng nhập");
                window.history.back();
            </script>';
        }else
        if( auth()->user()->type=="3") {
            return view("RentHouse.create");
        }else{
            echo '<script> alert("Bạn không phải là sinh viên");
                window.history.back();
            </script>';
        }
    }

    public function store(Request $request){
        $data=array();
        $code = auth()->user()->username;
        $student_id=DB::table('students')->where('code',$code)->value('id');
        $data['student_id']=$student_id;
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
        $data = DB::table('motels')->where('student_id', $student_id)->orderBy('date_join', 'desc')->paginate(5);
        return view("RentHouse.index", ['data' => $data]);
    }
}
