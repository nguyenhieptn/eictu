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
    public function index(){
        $id_sinhvien=1;
        $data=DB::table('motels')->where('student_id',$id_sinhvien)->get();
        return view("rentHouse.index",['data'=>$data]);
    }

    public function create(){
        return view("rentHouse.create");
    }

    public function search(Request $request){
        $masv = $request->input('masv');
        $id_sinhvien = DB::table('students')->where('code', $masv)->value('id');
        $data=DB::table('motels')->where('student_id',$id_sinhvien)->get();
        return view("rentHouse.search",['data'=>$data]);
    }

    public function store(Request $request){
        $data=array();
        $data['student_id']=$request->input('student_id');
        $data['hostess'] = $request->input('hostess');
        $data['address'] = $request->input('address');
        $data['date_join'] = $request->input('date_join');
        /*
        $this->validate($request,[
            'hoten'=>'required',
            'diachi'=>'required',
            'ngayo'=>'required'
        ]);
        */
        $renthouse = new RentHouse();
        $renthouse->student_id=$data['student_id'];
        $renthouse->hostess=$data['hostess'];
        $renthouse->address=$data['address'];
        $renthouse->date_join=$data['date_join'];
        $renthouse->save();

        return redirect('rentHouse');
    }

    public function update(){
        return view("rentHouse.update");
    }
    public function delete(){
        return view("rentHouse.delete");
    }
}
