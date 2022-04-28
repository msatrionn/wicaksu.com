<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("home");
    }
    public function message_admin()
    {
        // if (auth()->user()->isadmin == 1) {
        $user = User::where("isadmin", "!=", 1)->get();
        // dd($data);
        return view("messages", compact("user"));
        // }
    }
    public function show_msg(Request $request)
    {
        // if (auth()->user()->isadmin == 1) {
        $users = User::where("isadmin", 1)->first()->id;

        $data = Messages::where("from_msg", 3)
            ->where("to_msg", $request->id)
            ->orWhere("from_msg", $request->id)
            ->where("to_msg", $users)
            ->orderBy("created_at", "desc")
            ->get();
        // dd($data);
        $id = $request->id;
        $user = User::where("isadmin", "!=", 1)->get();
        return view("message_detail", compact("data", "user", "id"));
        // }
    }
    public function send_message(Request $request)
    {
        if (auth()->user()->isadmin == 1) {
            $user = User::where("isadmin", 1)->first()->id;
            $id_user = $request->id_user;
            $message = $request->message;

            $save_message = new Messages();
            $save_message->from_msg = $user;
            $save_message->to_msg = $id_user;
            $save_message->message = $message;
            $save_message->save();
        }
    }
    public function chat_client()
    {
        return view("layouts.chat-client");
    }
    public function message_client(Request $request)
    {
        $user = User::where("isadmin", 1)->first()->id;
        $id_user = $request->id_user;
        $message = $request->message;

        $save_message = new Messages();
        $save_message->from_msg = $id_user;
        $save_message->to_msg = $user;
        $save_message->message = $message;
        $save_message->save();
    }
}
