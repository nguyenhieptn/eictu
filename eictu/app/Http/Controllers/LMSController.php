<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Schedule;
use Auth;

use Illuminate\Database\Schema\Blueprint;
class LMSController extends Controller
{
    public function getshow()
    {
        if (!Auth::guest()) {
            if (Auth::user()->type == 3)
                $code = Auth::user()->username;
            $student = DB::table('students')->where('code', $code)->first();
            $row = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->count();
            if ($row == 0) {
                $data = DB::table('studyprograms')->where('major_id', '=', $student->major_id)->get();
                foreach ($data as $value) {
                    DB::table('schedules')->insert(array('student_id' => $student->id, 'studyprogram_id' => $value->id, 'situation' => 0));
                }
                return redirect("LMS/show");
            } else {

                $datas = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->orderby('term')->get();
                $row1 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->count();
                $row2 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->where('situation', '>', 0)->count();
                $s1 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->sum('credit');
                $s2 = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('student_id', '=', $student->id)->where('situation', '>', 0)->sum('credit');
                $sum1 = $s1 * 240000;
                $sum2 = $s2 * 240000;
                $sth1 = $s1 * 15;
                $sth2 = $s2 * 15;
                return view('LMS.show', ['datas' => $datas, 'row1' => $row1, 'row2' => $row2, 'sum1' => $sum1, 'sum2' => $sum2, 'sth1' => $sth1, 'sth2' => $sth2, 'st' => $student]);

            }
        } else {

            return redirect('/login');
        }
    }

    public function getupdate($id)
    {
        if (!Auth::guest()) {
            if (Auth::user()->type == 3)
                $code = Auth::user()->username;
            $student = DB::table('students')->where('code', $code)->first();
            $datas = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('schedules.id', '=', $id)->get();
            return view('LMS.update', ['datas' => $datas, 'st' => $student]);
        }
    }

    public function update(Request $request, $id)
    {
        $code = Auth::user()->username;
        $student = DB::table('students')->where('code', $code)->first();
        $datas = DB::table('studyprograms')->join('schedules', 'studyprograms.id', '=', 'schedules.studyprogram_id')->where('schedules.id', '=', $id)->first();
        $cre=$datas->credit*15;
        $term = $request->input('term');
        DB::table('schedules')->where('id', $id)->update(array('situation' => $term));
        DB::table('newsfeed')->insert(array('student_id' => $student->id,'content' => 'Vừa hoàn thành chương trình học của môn '.$datas->name.', '.$cre.' tiết/'.$datas->credit.' tín chỉ.','type' => '6'));
        return redirect("LMS/show");
    }
    public function droptable(){
        Schema::drop('schedules');
    }
    public function createtable(){
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('studyprogram_id')->unsigned();
            $table->foreign('studyprogram_id')->references('id')->on('studyprograms');
            $table->smallInteger('situation');
            $table->timestamps();
        });
    }
}
