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
        $data=DB::table('renthouse')->where('id_sinhvien',$id_sinhvien)->get();
        return view("rentHouse.index",['data'=>$data]);
    }

    public function create(){
        return view("rentHouse.create");
    }

    public function search(Request $request){
        $masv = $request->input('masv');
        $id_sinhvien = DB::table('students')->where('code', $masv)->value('id');
        $data=DB::table('renthouse')->where('id_sinhvien',$id_sinhvien)->get();
        return view("rentHouse.search",['data'=>$data]);
    }

    public function store(Request $request){
        $data=array();
        $data['id_sinhvien']=$request->input('id_sinhvien');
        $data['hotenchutro'] = $request->input('hotenchutro');
        $data['diachinhatro'] = $request->input('diachinhatro');
        $data['ngayvaotro'] = $request->input('ngayvaotro');
        /*
        $this->validate($request,[
            'hoten'=>'required',
            'diachi'=>'required',
            'ngayo'=>'required'
        ]);
        */
        $renthouse = new RentHouse();
        $renthouse->id_sinhvien=$data['id_sinhvien'];
        $renthouse->hotenchunha=$data['hotenchutro'];
        $renthouse->diachinhatro=$data['diachinhatro'];
        $renthouse->ngayvaotro=$data['ngayvaotro'];
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
