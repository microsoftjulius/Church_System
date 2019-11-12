<?php
namespace App\Http\Controllers;

use App\category;
use App\Contacts;
use App\messages as message;
use App\Groups;
use App\searchTerms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MessagesCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Date;

class messages extends Controller {
    public function index() {
        // return view('after_login.messages');
        //return new MessagesCollection(message::all()); this transforms only one instance
        return MessagesCollection::collection(message::all());
    }
    public function search_use_contact_group_attributes(Request $request) {
        $search = $request->search;
        $display_sent_message_details = message::where('created_by', $search)->where('church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.sent-messages', compact('display_sent_message_details'));
    }
    public function display_sent_messages() {
        $display_sent_message_details = message::join('users', 'users.id', 'messages.created_by')->where('users.church_id', Auth::user()->church_id)->select('messages.id', 'messages.message', 'messages.tobesent_on', 'messages.status', 'users.email')->paginate('10');
        return view('after_login.sent-messages', compact('display_sent_message_details'));
    }
    public function drop_down_groups() {
        $drop_down_groups = Groups::where('church_id', Auth::user()->church_id)->select("group_name", "number_of_contacts", "id")->get();
        return view('after_login.Quicksms', compact('drop_down_groups'));
    }
    public function contact_groups(Request $request) {
        return view('after_login.groups');
    }
    public function store_sent_messages(Request $request) {
        if (empty($request->message)) {
            return Redirect()->back()->withInput()->withErrors("Make sure the Message Field is not Empty");
        }
        if (empty($request->checkbox)) {
            return Redirect()->back()->withInput()->withErrors("Make sure you have selected at least one group");
        }
        $message_to_send = $request->message;
        for ($i = 0;$i < count($request->checkbox);$i++) {
            $contact_array = json_decode(Contacts::where('contacts.group_id', $request->checkbox[$i])->value('contact_number'));

        if(count($contact_array) < 2){
            return Redirect()->back()->withInput()->withErrors("Some of the chosen groups have no contacts");
        }

            //return $contact_array;
            foreach ($contact_array as $contact) {
                //$contact->Contact;
                //echo $contact->Contact;
                $data = array('method' => 'SendSms', 'userdata' => array('username' => 'microsoft', // Egosms Username
                'password' => '123456'
                //Egosms Password
                ), 'msgdata' => array(array('number' => $contact->Contact, 'message' => $message_to_send, 'senderid' => 'Good')));
                //encode the array into json
                $json_builder = json_encode($data);
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
                //print_r(json_decode($ch_result, true));
            }
            $empty_array = array();
            $message_response = json_decode($ch_result, true);
            if(empty($message_response)){
                return Redirect()->back()->withInput()->withErrors("check your internet connection");
            }
            foreach($message_response as $res){
                //return $res;
                array_push($empty_array, $res);
            }
            //return $empty_array;
            message::create(array('church_id' => Auth::user()->church_id, 'group_id' => $request->checkbox[$i],
            'message' => $request->message, 'tobesent_on' => $request->created_at, 'status'=>$empty_array[0], 'created_by' => Auth::user()->id));
            //count for contacts in each group
            //return count($request->checkbox);
        }
        if($empty_array[1] == 30){
        return redirect()->back()->withErrors("Message sending was successful");
        }
        return redirect()->back()->withErrors($empty_array[2]);
    }
    public function search_messages(Request $request) {
        $display_sent_message_details = message::where('message', $request->search_message)->orWhere('message', 'like', '%' . $request->search_message . '%')->where('church_id', Auth::user()->church_id)
        ->where('status','Recieved')
        ->paginate('10');
        return view('after_login.sent-messages', compact('display_sent_message_details'))->with(['search_query' => $request->search_message]);
    }
    //for new sprints 7 and 8
    public function search_message_categories(Request $request) {
        $category = category::join('users','users.id','category.user_id')->where('title', $request->category)
        ->orWhere('title', 'like', '%' . $request->category . '%')
        ->orWhere('name', 'like', '%' . $request->category . '%')
        ->where('category.church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.message-categories', compact('category'))
        ->with(['search_query' => $request->search_category]);
        //return $request->category;
    }

    public function show_add_category_blade(){
        return view('after_login.add-message-category');
    }
    public function save_message_category(Request $request) {
        if(category::where('church_id',Auth::user()->church_id)->exists() && category::where('title',$request->category)->exists()){
            return Redirect()->back()->withInput()->withErrors("Message category already registered");
        }
        category::create(array('church_id' => Auth::user()->church_id, 'title' => $request->category,'user_id'=>Auth::user()->id));
        return redirect('/message-categories')->withErrors("Category added successfully");
    }
    public function save_added_search_terms(Request $request) {
        message::create(array('church_id' => Auth::user()->church_id, 'search_term_name' => $request->search_term_name, 'search_terms_list'->$request->search_terms_list));
    }
    public function read_file() {
        $fn = "myfile.txt";
        $result = file_get_contents("myfile.txt");
        $emp = [];
        $newvalue = "category";
        $category = ['Ability', 'each', 'following'];
        $new_text = str_replace("<text>", $newvalue, $result);
        array_push($emp, $new_text);
        foreach ($emp as $value) {
            for ($i = 0;$i < strlen($new_text);$i++) {
                if ($new_text[$i] != "each") {
                    echo $value;
                }
            }
        }
    }
    public function message_categories_page() {
        $category = category::where('category.church_id', Auth::user()->church_id)->join('users', 'users.id', 'category.user_id')
        ->select('category.id','title', 'name')->paginate('10');
        return view('after_login.message-categories', compact('category'));
    }
    public function show_search_terms(Request $request, $id) {
        $check_if_element_exists_array = [];
        $search_term = json_decode(searchTerms::where('church_id', Auth::user()->church_id)->value('search_term'));
            if((searchTerms::where('category_id',$id))->exists()){
                $search_term = searchTerms::where('search_terms.church_id', Auth::user()->church_id)
                ->where('category_id',$id)
                ->join('users', 'users.id', 'search_terms.user_id')
                ->select('name', 'search_term','email','category_id')->first();

                $contacts = json_decode($search_term->search_term);
                $contacts = array_slice($contacts, 1);

                $count = count($contacts);
                $offset = ($request->page - 1) * 10;
                $contacts = new LengthAwarePaginator(array_slice($contacts, $offset, 10), $count, 10, $request->page);
                $contacts->withPath("/search-term-list/$id");
                return view('after_login.search-term-table', compact('search_term', 'contacts'));
            }
            else{
                searchTerms::create(array(
                    'search_term' => '[{"search_term":""}]',
                    'user_id' => Auth::user()->id,
                    'church_id' => Auth::user()->church_id,
                    'category_id' => $id
                ));
                $search_term = searchTerms::where('search_terms.church_id', Auth::user()->church_id)
                ->where('category_id',$id)
                ->join('users', 'users.id', 'search_terms.user_id')
                ->select('name', 'search_term','email','category_id')->first();

                $contacts = json_decode($search_term->search_term);
                $contacts = array_slice($contacts, 1);

                $count = count($contacts);
                $offset = ($request->page - 1) * 10;
                $contacts = new LengthAwarePaginator(array_slice($contacts, $offset, 10), $count, 10, $request->page);
                $contacts->withPath("/search-term-list/$id");
                return view('after_login.search-term-table', compact('search_term', 'contacts'));
            }

        $search_term = searchTerms::where('search_terms.church_id', Auth::user()->church_id)
        ->where('category_id',$id)
        ->join('users', 'users.id', 'search_terms.user_id')
        ->select('name', 'search_term','email','category_id')->first();

        $contacts = json_decode($search_term->search_term);
        $contacts = array_slice($contacts, 1);

        $count = count($contacts);
        $offset = ($request->page - 1) * 10;
        $contacts = new LengthAwarePaginator(array_slice($contacts, $offset, 10), $count, 10, $request->page);
        $contacts->withPath("/search-term-list/$id");
        return view('after_login.search-term-table', compact('search_term', 'contacts'));
    }
    public function save_search_terms(Request $request, $id) {
        $check_if_element_exists_array = [];
        $search_term = json_decode(searchTerms::where('church_id', Auth::user()->church_id)->where('category_id',$id)->value('search_term'));
        foreach ($search_term as $item) {
            array_push($check_if_element_exists_array, $item->search_term);
            if (in_array($request->search_term, $check_if_element_exists_array)) {
                return Redirect()->back()->withInput()->withErrors("search term is already registered");
            }
        }
        //$nospace_request = str_replace(" ", "", $request->search_term);
        $empty_array = array('search_term' => $request->search_term);
        array_push($search_term, $empty_array);
        //saving new array to the database
        searchTerms::where('church_id', Auth::user()->church_id)->where('category_id',$id)->update(array(
            'search_term' => json_encode($search_term),
            'user_id'     => Auth::user()->id
        ));
        return Redirect()->back()->withInput()->withErrors('Search term added successfully');
    }
    public function delete_search_term($id, Request $request){
        $empty_array = array();
        $search_term = json_decode(searchTerms::where('church_id', Auth::user()->church_id)->where('category_id',$id)->value('search_term'));
        unset($search_term[$request->index_to_delete + 1]);
        foreach($search_term as $array){
            array_push($empty_array, $array);
        }
        searchTerms::where('church_id', Auth::user()->church_id)->where('category_id',$id)->update(array('search_term' => json_encode($empty_array)));
        return Redirect()->back()->withInput()->withErrors("Search Term was deleted Successfully");
    }

    public function display_message_category_form($id){
        $all_search_terms = searchTerms::where('church_id',Auth::user()->church_id)
        ->where('category_id',$id)
        ->paginate(10);
        $category = category::where('id',$id)
        ->select('title','id')->get();
        //$search_term = DB::table('users')
        return view('after_login.search-term-form',compact('category','all_search_terms'));
    }

    public function edit_message_category(Request $request, $id){
        category::where('id',$id)
        ->update(
                array('title'=> $request->new_category_title)
        );
        return redirect('/message-categories')->withErrors('Category update was successful ');
    }
    public function show_incoming_messages(Request $request){
        $messages_to_categories = category::join('messages','messages.category_id','category.id')
        ->where('category.church_id',Auth::user()->church_id)
        ->where('status','Recieved')
        ->select('messages.message','category.title')->paginate('10');
        $drop_down_categories = category::where('church_id', Auth::user()->church_id)
        ->select("title", "user_id", "id")->paginate(10);

        return view('after_login.incoming-messages',compact('messages_to_categories','drop_down_categories'));
    }
    // public function picking_messages_from_api(){
    //     $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic(API_KEY, API_SECRET));
    //     $message = new \Nexmo\Message\InboundMessage('ID');
    //     $client->message()->search($message);
    //     echo "The body of the message was: " . $message->getBody();
    // }
    public function display_search_terms(){
        $all_search_terms = searchTerms::all();
        return $all_search_terms;
    }

    public function incoming(Request $request){
        //get all search terms from the database
        $search_terms = searchTerms::all();
        $search_terms_array = [];
        //return $search_terms;
        foreach($search_terms as $search_term){
            $var = json_decode(strtolower($search_term->search_term));
            foreach($var as $value){
                array_push($search_terms_array,$value->search_term);
            }
            break;
        }
        //return $search_terms_array;
        //convert message to array

        $message_array = explode(" ",strtolower($request->message));
        // print_r($search_terms_array);
        // print_r($message_array);

        $empty_array = [];
        //check if any member occurs in both arrays
        $result=array_intersect($search_terms_array,$message_array);
        foreach($result as $res){
            array_push($empty_array, $res);
        }
        //return($empty_array);
        /*
        here, get the category id of the key word that has been saved in the
        result variable and map it. then its done
        */
        foreach($empty_array as $element){
        $category_id = category::where('title',$element)->value('id');
        //return($result);
        //get the message from the request
        $recieved_message = $request->message;
        if(strpos($recieved_message, 'God') !== false){
        message::create(array(
            //for now testing with one group, we ask on how to get the group id from the phone
            'group_id'      => $request->group,
            'church_id'     => $request->church,
            'category_id'   => $category_id,
            'message'       => $request->message,
            'contact_character' => 0,
            'tobesent_on'     => '',
            'status'         => 'Recieved'
        ));
        return redirect('/incoming-messages')->withErrors('New message recieved');
        }
        else{
            message::create(array(
                'group_id'      => $request->group,
                'church_id'     => $request->church,
                'category_id'   => 1,
                'message'       => $request->message,
                'contact_character' => 0,
                'tobesent_on'     => '',
                'status'         => 'Recieved'
            ));
        }
        }
        return redirect('/incoming-messages')->withErrors('New message recieved with default key word');

    }
    public function searchIncomingMessages(Request $request)
        {
            //return $request->from;
            //return $request->search_message;
            //return $request->to;
            /**
             * get the created_at year, convert it to the required date time format
             * check the messages table where created_at is between the input converted dates
             */
            if(empty($request->from) && empty($request->to)){
                $messages_to_categories = message::join('category','messages.category_id','category.id')
                ->where('title',$request->search_message)->paginate('10');
                $drop_down_categories = category::where('church_id', Auth::user()->church_id)
                ->select("title", "user_id", "id")->paginate(10);
                return view('after_login.incoming-messages',compact('messages_to_categories','drop_down_categories'));
            }
            if(empty($request->from)){
                $messages_to_categories = message::join('category','messages.category_id','category.id')
                ->where('messages.created_at',[Date::make($request->to)->format('Y-m-d H-i-s')])
                ->where('title',$request->search_message)->paginate('10');
                $drop_down_categories = category::where('church_id', Auth::user()->church_id)
                ->select("title", "user_id", "id")->paginate(10);
                return view('after_login.incoming-messages',compact('messages_to_categories','drop_down_categories'));
            }
            if(empty($request->to)){
                $messages_to_categories = message::join('category','messages.category_id','category.id')
                ->where('messages.created_at',[Date::make($request->from)->format('Y-m-d H-i-s')])
                ->where('title',$request->search_message)->paginate('10');
                $drop_down_categories = category::where('church_id', Auth::user()->church_id)
                ->select("title", "user_id", "id")->paginate(10);
                return view('after_login.incoming-messages',compact('messages_to_categories','drop_down_categories'));
            }
            $messages_to_categories = message::join('category','messages.category_id','category.id')
            ->whereBetween('messages.created_at',[Date::make($request->from)->format('Y-m-d H-i-s'), Date::make($request->to)->format('Y-m-d H-i-s')])
            ->where('title',$request->search_message)->paginate('10');
            $drop_down_categories = category::where('church_id', Auth::user()->church_id)
            ->select("title", "user_id", "id")->paginate(10);
            return view('after_login.incoming-messages',compact('messages_to_categories','drop_down_categories'));
        }
        
}
