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
use App\NewsFeed;

class FindJobController extends Controller
{

    public function getIndex()
    {
        if(Auth::check() && Auth::user()->type==3){
              $datas= DB::table('searchjobs')->join('users','searchjobs.student_id','users.id')->join('students','users.username','students.code')->orderby('searchjobs.created_at','DESC')->select('searchjobs.id as sid','users.name','searchjobs.content','searchjobs.created_at','students.avatar')->get();
            return view('findjob.index')->with('datas',$datas);
        }else{
           $datas= DB::table('searchjobs')->join('users','searchjobs.student_id','users.id')->join('students','users.username','students.code')->orderby('searchjobs.created_at','DESC')->select('searchjobs.id as sid','users.name','searchjobs.content','searchjobs.created_at','students.avatar')->get();
           return view('findjob.index')->with('datas',$datas);
        }
        
    }

    public function addPost(Request $request)
    {
            $input = $request->all();
            $rule = [
                'content' => 'required'
            ];
            $message = [
                'content.required' => 'vui lòng nhập nội dung bản tin'
            ];
            $validator = Validator::make($input, $rule, $message);
            if ($validator->fails()) {
                return redirect()->back()->with('err',$validator->errors());
             }else{
                FindJob::create([
                    'content' => $input['content'],
                    'student_id' => Auth::user()->id
                ]);
                NewsFeed::create([
                    'content' => $input['content'],
                    'student_id' => Auth::user()->id
                ]);
                return redirect('findjob/index');
             }

      }
          

    public function getDetail($id)
    {
     $detail=  DB::table('searchjobs')->join('users','searchjobs.student_id','users.id')->join('students','users.username','students.code')->where('searchjobs.id',$id)->select('searchjobs.content','users.name','students.avatar','searchjobs.created_at as day','students.gender','students.code')->first();
     return view('findjob.detail', compact('detail'));
    }

    public function total(){
        $total = FindJob::where('student_id',Auth::user()->id)->paginate(5);
        return view('findjob.total')->with('total',$total);
    }

    public function del($id)
    {
       $del = FindJob::find($id);
       $del->delete($id);
       return redirect()->route('findjob.total');
    }

    public function edit($id)
    {
        $data = FindJob::where('id',$id)->first();
        return view('findjob.edit')->with('data',$data);
    }

    public function update($id,Request $request)
    {
        
            $input = $request->all();
            $rule = [
                'content' => 'required'
            ];
            $message = [
                'content.required' => 'vui lòng nhập nội dung bản tin cần sửa đổi'
            ];
            $validator = Validator::make($input, $rule, $message);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator,'err');
             }else{
                $fb = FindJob::find($id);
                $fb->content = $request->content;
                 $fb->student_id =Auth::user()->id;
                $fb->save();
               Session::flash('success', 'Cập nhật dữ liệu thành công ! ');
                return redirect('findjob/total');
             }

    }


}
