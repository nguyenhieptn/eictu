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

    public function search(Request $request)
    {
        $data = array();
        $user_id = Auth::user()->username;

        $data['id_search'] = $request->input('message');
        $data['user_id'] = $user_id ;

        return view('chat.friend', ['data' => $data]);

    }

    public function friends()
    {

        $user = Auth::user()->username;

        $student = DB::table('students')->where('code', $user)->first();

        $code = $student->code;
        return redirect("chat/classroom?c=CNTT_K11B&id=".$code);
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

    public function page($slug)
    {

        return view('chat/' . $slug, ['name' => $slug]);
    }


}
