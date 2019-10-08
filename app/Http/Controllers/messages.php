<?php

namespace App\Http\Controllers;

use App\Contacts;
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

    public function search_use_contact_group_attributes(Request $request) {
        $search = $request->search;
            $display_sent_message_details = message::where('created_by',$search)
            ->where('church_id',Auth::user()->church_id)->paginate('10');
            return view('after_login.sent-messages', compact('display_sent_message_details'));
    }

    public function display_sent_messages()
    {
    $display_sent_message_details = message::join('users','users.id', 'messages.created_by')
    ->where('users.church_id',Auth::user()->church_id)
    ->select('messages.id', 'messages.message','messages.created_on','messages.status','users.email')->paginate('10');
    return view('after_login.sent-messages',compact('display_sent_message_details'));
    }

    public function drop_down_groups(){
        $drop_down_groups = Groups::where('church_id',Auth::user()->church_id)
        ->select("group_name","number_of_contacts")->get();
        return view('after_login.Quicksms',compact('drop_down_groups'));
    }

    public function contact_groups(Request $request) {
        return view('after_login.groups');
    }

    public function store_sent_messages(Request $request){
        if(empty($request->message)){
            return Redirect()->back()->withErrors("Make sure the Message Field is not Empty");
        }
        $message_to_send = $request->message;
        for($i = 0; $i<count($request->checkbox); $i++){
        $contact_array = json_decode(Contacts::where('contacts.group_id',$request->checkbox[$i])->value('contact_number'));
        foreach($contact_array as $contact){
                $contact->Contact;
                //echo $contact->Contact;
                $data= array(
                    'method'=>'SendSms',
                    'userdata'=> array(
                    'username'=>'microsoft',// Egosms Username
                    'password'=>'123456' //Egosms Password
                    ),
                    'msgdata'=> array(
                    array('number'=>$contact->Contact,'message'=>$message_to_send,'senderid'=>'Good')
                    )
                );
                    //encode the array into json
                    $json_builder =json_encode($data);
                    //use curl to post the the json encoded information
                    $ch = curl_init('http://www.egosms.co/api/v1/json/');
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_builder);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $ch_result = curl_exec($ch);
                    curl_close($ch);
                    //print an array that is json decoded
                    print_r(json_decode($ch_result,true));
        }
        message::create(array(
            'church_id'   =>  Auth::user()->church_id,
            'group_id'     =>  $request->checkbox[$i],
            'message'      =>  $request->message,
            'contact_character' =>$request->contact_character,
            'created_on'   =>  $request->created_at,
            'created_by'    =>  Auth::user()->id
        ));

          //count for contacs in each group
         
            //return count($request->checkbox);
        }
        return redirect('/sent-quick-messages');
    }

    public function search_messages(Request $request){
        $display_sent_message_details = message::where('message',$request->search_message)
        ->orWhere('message', 'like', '%' . $request->search_message. '%')
        ->where('church_id',Auth::user()->church_id)
        ->paginate('10');
        return view('after_login.sent-messages',compact('display_sent_message_details'))->with([
            'search_query' => $request->search_message
        ]);
    }

    public function search_message_categories(Request $request){
        $display_message_categories = message::where('message_category',$request->search_category)
        ->orWhere('message_category', 'like', '%' .$request->search_category. '%')
        ->where('chuerch_id',Auth::user()->church_id)
        ->paginate('10');
        return view('after_login.message-categories',compact('display_message_categories'))->with([
            'search_query' =>$request->search_category
        ]);
            }

    public function save_message_category(Request $request){
        message::create(array(
        'church_id'  =>  Auth::user()->church_id,
        'message_category' =>$request->message_category,
        ));
        return redirect('/message-categories');
    }

    public function save_added_search_terms(Request $request){
        message::create(array(
          'church_id' =>Auth::user()->church_id,
          'search_term_name' =>$request->search_term_name,
          'search_terms_list' ->$request->search_terms_list
        ));
    } 

    public function read_file(){
      $fn = "myfile.txt";
        $result = file_get_contents("myfile.txt");

        $emp = [];
        $newvalue = "category";
        $category = ['Ability', 'each' ,'following'];
        $new_text = str_replace("<text>",$newvalue,$result);
        array_push($emp, $new_text);
            //return array_count_values($emp);
            foreach($emp as $value){
                for($i =0; $i<strlen($new_text); $i++){
                    if($new_text[$i] != "each"){
                        echo $value;
                    }
                }
            }
        //return substr_count($new_text, $newvalue); 
        //return view('after_login.file-reading',compact("new_text"));
    }
   
  

}
