<?php

namespace App\Http\Controllers;

use App\RentHouse;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Http\Requests;

class RentHousesController extends Controller
{
    //
    public function index(){
        return view("RentHouses.index");
    }

    public function create(){
        return view("RentHouses.create");
    }

    public function search(Request $request){
        $masv = $request->input('masv');
        $id_sinhvien = DB::table('tbl_sinhvien')->where('masv', $masv)->value('id');
        $data=array();
        $data=DB::table('tbl_nhatro')->where('id_sinhvien',$id_sinhvien)->get();
        return view("RentHouses.search",['data'=>$data]);
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

        return redirect('renthouses');
    }

    public function update(){
        return view("RentHouses.update");
    }
    public function delete(){
        return view("RentHouses.delete");
    }
}
