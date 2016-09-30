<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateSDRequest;
use App\Dormitory;
use App\School;
use App\Student;
use DB;
use Auth;
use Cache;
use Carbon\Carbon;

class DormitoryController extends Controller
{

    private static $oldInfo = '';
    //
    public function getUpdate(){
       if(!Auth::guest()){
            if(Auth::user()->type == 3){
                $code = Auth::user()->username;
                $student = DB::table('students')->where('code', $code)->first();
                $school = DB::table('schools')->where('id', $student->school_id)->first();
                $dormitory = DB::table('dormitories')->where('student_id', $student->id)->first();
                if($dormitory != ""){
                    $area = DB::table('areas')->where('id', $dormitory->area_id)->first();
                    $str = "Phòng ".$dormitory->room.", Nhà ".$dormitory->building.', '.$area->name.', KTX '.$school->name;

                    $date = date('d/m/Y',strtotime($dormitory->start_on));
                   return view('dormitory.update_student', compact('str', 'date'));
                }
                else
                    return redirect()->back()->with('msg', 'Bạn không có quền cập nhật thông tin này.');
              
        }
        else{
            return redirect()->back()->with('msg', 'Bạn không có quền cập nhật thông tin này.');
        }
       }
       else
        return redirect('student/login');
    }

    public function postUpdate(UpdateSDRequest $req){
       
        $data = $req->info;
        $data = explode(',', $data);
        $date = explode('/', $req->start_on);
        $date2 = $date['2'].'-'.$date[1].'-'.$date[0];

        //$dateX = date("d/m/Y", mktime(0, 0, 0, $date[1], $date[0], $date[2]));
      
        $room = trim(str_replace('Phòng ', '', $data[0]));
        $building = trim(str_replace('Nhà ', '', $data[1]));
        $area = trim($data[2]);

        $code = Auth::user()->username;
        $student = DB::table('students')->where('code', $code)->first();
        $school = DB::table('schools')->where('id', $student->school_id)->first();
        $a = DB::table('areas')->where('name', $area)->first();
        $up = DB::table('dormitories')->where('student_id', $student->id)->update([
            'room' => $room,
            'building'=> $building,
            'school_id'=> 1,
            //'area_id'=> 1, //$a->id,
            'start_on'=> $date2
        ]);

        //CACHE
        $str = '<li class="item-update">Ngày <strong>'.$req->start_on."</strong> <a>Chuyển tới chỗ ở mới</a> trong KTX tại Phòng ".$room." Nhà ".$building.", ".$area." KTX ".$school->name.'</li>';
        $id = $student->id;
        $expiresAt = Carbon::now()->addDays(7);

        if(!Cache::has($id)){

            Cache::put($id, $str, $expiresAt);
            Cache::put('_'.$id, $str, $expiresAt);
        }
        else{
            //Cache::forget($id);
            $ss = Cache::get($id);
            $EX = explode($str, '<br>');
            if($str == Cache::get('_'.$id)){
                //Do nothing
            }
            else{
            //Cache::forget($id);
               Cache::put($id, $str.'<br>'.$ss, $expiresAt);
                Cache::put('_'.$id, $str, $expiresAt);

                //Them vao bang newsfeed;
                DB::table('newsfeed')->insert([
                    'student_id'=> $id,
                    'content'=>$str
                    ]);
            }
        }
        $oldInfo = $str;
        
        return redirect()->back()->with('msg', 'Cập nhật thành công!');
    }
    public function getSearch(){
    	return view('dormitory.search');
    }

    public function postSearch(){
    	if($_GET['student_id']){
    		$st = $_GET['student_id'];
    		$student = Student::where('code',$st)->first();
    		if($student == ""){
    			$none = "Không có kết quả";
    			return view('dormitory.search', compact('none'));
    		}
    		else{

	    		$school = DB::table('schools')->where('id', $student->school_id)->first();
	    		$dormitory = DB::table('dormitories')->where('student_id',$student->id)->first();
	    		if($dormitory == ""){
	    			$none = "Sinh viên này không ở KTX";
    				return view('dormitory.search', compact('none'));
	    		}
	    		else{
	    			$area = DB::table('areas')->where('id', $dormitory->area_id)->first();
                    return view('dormitory.search', compact('student', 'school', 'dormitory', 'area'));
	    		}
	    	}
    	}
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
        return view('schools.eICTuHomePage');
    }
}
