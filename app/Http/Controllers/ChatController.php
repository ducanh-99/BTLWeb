<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,DB,Cart;
class ChatController extends Controller
{
    public function chat(){
        return view('users.chat.chat');
    }
}
