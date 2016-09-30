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
        if(auth()->guest() || auth()->user()->type!=3){
            return redirect('rentHouse/search');
        }
        $code = auth()->user()->username;
        $student_id = DB::table('students')->where('code', $code)->value('id');
        $data = DB::table('motels')->where('student_id', $student_id)->orderBy('date_join', 'desc')->paginate(10);
        return view("RentHouse.index", ['data' => $data]);
    }
    public function search(Request $request)
    {
        $code = $request->input('code');
        $student=array();
        $data=array();
        if($code!=null) {
            $student = DB::table('students')->where('code', $code)->first();
            if($student!=null)
                $data = DB::table('motels')->where('student_id', $student->id)->orderBy('date_join', 'desc')->paginate(10);
        }
        return view("RentHouse.search", ['code'=>$code,'data' => $data,'student'=>$student]);
    }

    public function create(){
        if(auth()->guest() || auth()->user()->type!=3){
            return redirect('rentHouse/search');
        }else{
            return view("RentHouse.create");
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
        $data = DB::table('motels')->where('student_id', $student_id)->orderBy('date_join', 'desc')->paginate(10);
        return view("RentHouse.index", ['data' => $data]);
    }
}
