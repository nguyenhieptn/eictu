<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\FindJob;
use DB;

class FindJobController extends Controller
{

    public function getIndex()
    {
        if(Auth::check() && Auth::user()->type==3){
              $datas= DB::table('searchjobs')->join('users','searchjobs.student_id','users.id')->join('students','users.id','students.id')->orderby('searchjobs.id','DESC')->select('searchjobs.id as sid','users.name','searchjobs.content','searchjobs.created_at','students.avatar')->paginate(5);
            return view('findjob.index')->with('datas',$datas);
        }else{
            $datas= DB::table('searchjobs')->join('users','searchjobs.student_id','users.id')->join('students','users.id','students.id')->orderby('searchjobs.id','DESC')->select('searchjobs.id as sid','users.name','searchjobs.content','searchjobs.created_at','students.avatar')->paginate(5);
            return view('findjob.index')->with('datas',$datas);
        }
        
    }
    /**
     * @return string
     */

     public function addPost(Request $request)
    {
       if($request->ajax()){
                $input = $request->all();
            $rule = [
                'content' => 'required'
            ];
            $message = [
                'content.required' => 'vui lòng nhập nội dung bản tin'
            ];
            $validator = Validator::make($input, $rule, $message);
            if ($validator->fails()) {
                return response()->json([
                    'errors'=>true,
                    'messages'=>$validator->errors()
                    ]);
            }else{
                FindJob::create([
                    'content' => $input['content'],
                    'student_id' => Auth::user()->id
                ]);
                return response()->json([
                    'errors'=>false,
                    'messages'=>'Đăng tin Thành công !'
                    ]);
                  }

            }
          
            }

    public function getDetail($id)
    {
         $detail = DB::table('searchjobs')->where('id',$id)->get()->first();
         $code = DB::table('users')->where('id',$detail->student_id)->get()->first();
         $student = DB::table('students')->where('code',$code->username)->get()->first();
         return view('findjob.detail', compact('detail','student'));
    }

}
