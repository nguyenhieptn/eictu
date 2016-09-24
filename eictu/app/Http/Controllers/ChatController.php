<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function friend()
    {

        $user_id = Auth::user()->username;

        return view('chat.friend', ['users' => $user_id]);
    }

    public function friendroom()
    {

        $user_id = Auth::user()->username;

        return view('chat/friendroom', ['user_id' => $user_id]);
    }

    public function search(Request $request)
    {
        $data = array();
        $user_id = Auth::user()->username;

        $data['id_search'] = $request->input('message');
        $data['user_id'] = $user_id ;

        return view('chat.friend', ['data' => $data]);

    }


    public function classroom()
    {

        $user = Auth::user()->username;

        $student = DB::table('students')->where('code', $user)->first();

        $code = $student->code;
        $class_id = $student->class_id;
        $class = DB::table('classes')->where('id', $class_id)->first();
        $class_name = $class->name;
        return redirect("chat/classroom?c=".$class_name."&id=".$code);
    }

    public function classlist()
    {

        $user = Auth::user()->username;
        $type = Auth::user()->type;

        if ($type == 2 || $type == 1){
            $teacher = DB::table('teachers')->where('code', $user)->first();
            $teacher_name = $teacher->name;
            return view('chat.classlist', ['name' => $teacher_name]);
        } else {
            return view('chat.error');
        }

    }

    public function page($slug)
    {

        return view('chat/' . $slug, ['name' => $slug]);
    }


}
