<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::with('user_id_from')->where('user_id_to', Auth::id());
        return view('home')->with('messages', $messages);
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id());
        return view('create')->with('users', $users);
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->user_id_from = Auth::id();
        $message->user_id_to = $request->input('to');
        $message->subject = $request->input('subject');
        $message->body = $request->input('body');
        $message->save();

        return redirect()->to('/name')->with('status', 'Message sent successfully');
    }

    public function sent()
    {
        $messages = Message::with('userTo')->where('user_id_from', Auth::id())->get();
        return view('sent')->with('messages', $messages);
    }
}
