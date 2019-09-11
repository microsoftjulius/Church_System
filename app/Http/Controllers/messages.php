<?php

namespace App\Http\Controllers;

use DB;

use App\messages as message;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messages extends Controller
{
    public function index()
    {
        return view('after_login.messages');
    }


    public function display_sent_messages()
    {
    $display_sent_message_details = message::join('users','users.id', 'messages.created_by')
    ->where('users.church_id',Auth::user()->church_id)
    ->select('messages.id', 'messages.message','messages.created_on','messages.status','users.email')->get();
     return view('after_login.sent-messages',['display_sent_message_details'=>$display_sent_message_details]);
    }

    public function send_quick_sms(){
        $drop_down_groups = Groups::all();
        return view('after_login.Quicksms',compact('drop_down_groups'));
    }

    public function contact_groups(Request $request) {
        return view('after_login.groups');
    }
    

    public function store_sent_messages(Request $request){
        message::create(array(
            'church_id'   =>  Auth::user()->church_id,
            'group_id'     =>  $request->group_id,
            'message'      =>  $request->message,
            'contact_character' =>$request->contact_character,
            'created_on'   =>  $request->created_at,
            'created_by'    =>  Auth::user()->id
        ));
        return redirect('/sent-quick-messages');

        return $request->created_at;
    }
            
}


