<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
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
}
