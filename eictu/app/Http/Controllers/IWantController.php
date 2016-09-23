<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\IWant;
use App\Student;
use DB;
use App\Http\Requests;

class IWantController extends Controller
{
    public function getStatus()
    {
        if ( Auth::user()->type ==3) {
            return view('iWant.eICTuStudentDemandUpdate');
        }
        return view('teacher.homepage');
    	
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'content'=>'required|max:1000'
            ]);
        $iwant = new IWant();
        $iwant->content = $request->content;
        
        $student = Student::select('id')->where('code', Auth::user()->username)->first();

        $iwant->student_id       = $student->id;
        $iwant->save();
        // Auth::student()->iwants()->create([
        //     'content'=>$request->input('content'),
        //     ]);

        return redirect()->route('iwant.search');
    }
    public function search()
    {
        $data = IWant::select('id', 'content')->orderBy('id','DESC')->paginate(15);
    	return view('iWant.eICTuStudentDemandSearch', compact('data'));
    }
    public function detail($id)
    {   
        $want  = DB::table('wants')->where('id', $id)->first();
        $student = DB::table('students')->where('id', $want->student_id)->first();
        $address =DB::table('motels')->where('student_id', $want->student_id)->where('date_join', 'DESC')->first();
        $address2 =DB::table('dormirories')->where('student_id', $want->student_id)->where('start_on', 'DESC')->first();
        // if (strtotime($today) > strtotime($another_date)) {
        //     echo "Yesterday";
        //   } else {
        //     echo "Tomorrow";
        //   }
    	return view('iWant.eICTuStudentDemandDetail', compact('want', 'student', 'address', 'address2'));
    }


}
