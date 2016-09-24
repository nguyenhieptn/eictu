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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $datas = FindJob::orderby('id','DESC')->paginate(10);
        return view('findjob.index')->with('datas', $datas);
    }

    public function getPost()
    {
        return view('findjob.add');
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


    public function getDetail($id)
    {

          $detail = DB::table('searchjobs')->join('students', 'searchjobs.student_id', '=', 'students.id')->where('searchjobs.id', $id)->get()->first();
         return view('findjob.detail', compact('detail'));

      
    }

}
