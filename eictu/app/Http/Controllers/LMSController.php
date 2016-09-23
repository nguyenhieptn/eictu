<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Schedule;
class LMSController extends Controller
{
     public function getshow()
    {

    	$datas = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->get();
        return view('LMS.show', ['datas' => $datas]);

    }

    public function getupdate($id)
    {
		$datas = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('schedules.id','=',$id )->get();
    	return view('LMS.update',['datas' => $datas]);
    }

     public function update(Request $request,$id)
    {
    	 	
        $term = $request->input('term');          
        DB::table('schedules')->where('id',$id )->update(array('situation' =>$term));
        return redirect("LMS/show");
    }
}
