<?php

namespace App\Http\Controllers;

use App\RentHouse;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Http\Requests;

class RentHouseController extends Controller
{
    //
    public function index(Request $request){
        $code = $request->input('code');
        $student_id = DB::table('students')->where('code', $code)->value('id');
        $data=DB::table('motels')->where('student_id',$student_id)->get();
        return view("rentHouse.index",['data'=>$data]);
    }

    public function create(){
        return view("rentHouse.create");
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
         return redirect('rentHouse');
    }
}
