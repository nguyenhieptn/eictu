<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\IWant;
use App\Student;
use App\NewsFeed;
use DB;
use App\Http\Requests;

class IWantController extends Controller
{
    public function getStatus()
    {

        $data = IWant::select('id', 'content', 'student_id')->orderBy('id','DESC')->paginate(20);

        

        return view('iWant.eICTuStudentDemandUpdate', compact('data'));
    	
    }

    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'content'=>'required|max:1000'
            ]);
        $iwant = new IWant();
        $iwant->content = $request->content;
        $iwant->location = $request->location;
        
        $student = Student::select('id')->where('code', Auth::user()->username)->first();

        $iwant->student_id       = $student->id;
        $iwant->save();
        if ($iwant->save()) {
            $new = new NewsFeed();
            $new->student_id = $student->id;
            $new->content = $request->content;
//             $new->type = 9;
            $new->save();
        }
      

        return redirect()->back();
    }
    public function search()
    {
        // $data = IWant::select('id', 'content')->orderBy('id','DESC')->paginate(15);
    	return redirect()->route('iwant.status');
    }
    public function detail($id)
    {   
        $want  = DB::table('wants')->where('id', $id)->first();
        $student = DB::table('students')->where('id', $want->student_id)->first();

        $address =DB::table('motels')->where('student_id', $want->student_id)->orderBy('date_join', 'DESC')->first();
        $address2 =DB::table('dormitories')->where('student_id', $want->student_id)->orderBy('start_on', 'DESC')->first();
     
    	return view('iWant.eICTuStudentDemandDetail', compact('want', 'student', 'address', 'address2'));
    }


}
