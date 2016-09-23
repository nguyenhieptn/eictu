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
        $row1 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->count();
        $row2 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('situation','>',0)->count();
       	$s1 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->sum('credit');
       	$s2 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('situation','>',0)->sum('credit');
       	$sum1=$s1*240000;
       	$sum2=$s2*240000;
        return view('LMS.show', ['datas' => $datas,'row1' => $row1,'row2' => $row2,'sum1' => $sum1,'sum2' => $sum2]);
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
