<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FloatingChatbotController extends Controller
{
    public function index()
    {
        return view('floating-chatbot', ['standalone' => true]);
    }
}
