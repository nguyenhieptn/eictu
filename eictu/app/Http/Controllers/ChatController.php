<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function friend(){

        $users = DB::table('users')->get();

        return view('chat.friend', ['users' => $users]);
    }

    public function search(Request $request){

        $data = $request->input('message');

        return view('chat.friend', ['id_search' => $data]);

    }

    public function page($slug){

        return view('chat/'.$slug, ['name'=> $slug]);
    }


}
