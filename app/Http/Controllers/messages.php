<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class messages extends Controller
{
    public function index()
    {
        return view('after_login.messages');
    }


    public function send()
    {
     return view('after_login.sent-messages');
    }

    public function send_quick_sms(Request $request) {
        return view('after_login.Quicksms');
    }

    public function contact_groups(Request $request) {
        return view('after_login.groups');
    }
}


