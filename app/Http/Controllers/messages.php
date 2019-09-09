<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messages extends Controller
{
    public function index()
    {
        return view('after_login.messages');
    }
}
