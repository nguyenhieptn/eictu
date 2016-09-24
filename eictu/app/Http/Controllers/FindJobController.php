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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function getIndex()
    {
        $datas = FindJob::orderby('id','DESC')->paginate(10);
        return view('findjob.index')->with('datas', $datas);
    }

    public function getPost( Request $request)
    {
        if(Auth::user()->type ==3){
             return view('findjob.add');
         }else{
            $datas = FindJob::orderby('id','DESC')->paginate(10);
            $request->session()->flash('lock', 'vui lòng đăng nhập tài khoản sinh viên để thực hiện chức năng này');
            return view('findjob.index')->with('datas', $datas);
         }
       
    }

    /**
     * @return string
     */
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
            return redirect()->back()->withErrors($validator->errors());
        }
        FindJob::create([
            'content' => $input['content'],
            'student_id' => Auth::user()->id
        ]);
        return redirect()->route('findjob.index');
    }


    // public public function getstudentid($username)
    // {
    //     $data= DB::table('students')->
    //     select * from students where code=$username;    
    // }

    public function getDetail($id)
    {
        $code = DB::table('users')->where('id',$id)->get()->first();
        // var_dump($code);

         $detail = DB::table('searchjobs')->where('id',$id)->get()->first();
         $student = DB::table('students')->where('code',$code->username)->get()->first();
        // var_dump($student);
        return view('findjob.detail', compact('detail','student'));
    }

}
