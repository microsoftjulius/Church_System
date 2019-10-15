<?php
namespace App\Http\Controllers;

use App\category;
use App\Contacts;
use App\messages as message;
use App\Groups;
use App\searchTerms;
use App\messageCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class messages extends Controller {
    public function index() {
        return view('after_login.messages');
    }
    public function search_use_contact_group_attributes(Request $request) {
        $search = $request->search;
        $display_sent_message_details = message::where('created_by', $search)->where('church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.sent-messages', compact('display_sent_message_details'));
    }
    public function display_sent_messages() {
        $display_sent_message_details = message::join('users', 'users.id', 'messages.created_by')->where('users.church_id', Auth::user()->church_id)->select('messages.id', 'messages.message', 'messages.created_on', 'messages.status', 'users.email')->paginate('10');
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
            return Redirect()->back()->withErrors("Make sure the Message Field is not Empty");
        }
        $message_to_send = $request->message;
        for ($i = 0;$i < count($request->checkbox);$i++) {
            $contact_array = json_decode(Contacts::where('contacts.group_id', $request->checkbox[$i])->value('contact_number'));
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
                print_r(json_decode($ch_result, true));
            }
            message::create(array('church_id' => Auth::user()->church_id, 'group_id' => $request->checkbox[$i], 'message' => $request->message, 'contact_character' => $request->contact_character, 'created_on' => $request->created_at, 'created_by' => Auth::user()->id));
            //count for contacs in each group
            //return count($request->checkbox);

        }
        return redirect('/sent-quick-messages');
    }
    public function search_messages(Request $request) {
        $display_sent_message_details = message::where('message', $request->search_message)->orWhere('message', 'like', '%' . $request->search_message . '%')->where('church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.sent-messages', compact('display_sent_message_details'))->with(['search_query' => $request->search_message]);
    }
    //for new sprints 7 and 8
    public function search_message_categories(Request $request) {
        $display_message_categories = category::where('message_category', $request->search_category)->orWhere('message_category', 'like', '%' . $request->search_category . '%')->where('church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.message-categories', compact('display_message_categories'))->with(['search_query' => $request->search_category]);
    }

    public function show_add_category_blade(){
        return view('after_login.add-message-category');
    }
    public function save_message_category(Request $request) {
        if(category::where('church_id',Auth::user()->church_id)->exists() && category::where('title',$request->category)->exists()){
            return Redirect()->back()->withErrors("Message category already registered");
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
        //return array_count_values($emp);
        foreach ($emp as $value) {
            for ($i = 0;$i < strlen($new_text);$i++) {
                if ($new_text[$i] != "each") {
                    echo $value;
                }
            }
        }
        //return substr_count($new_text, $newvalue);
        //return view('after_login.file-reading',compact("new_text"));

    }
    public function message_categories_page() {
        $category = category::where('category.church_id', Auth::user()->church_id)->join('users', 'users.id', 'category.user_id')
        ->select('title', 'name')->paginate('10');
        return view('after_login.message-categories', compact('category'));
    }
    public function show_search_terms() {
        $search_term = searchTerms::where('search_terms.church_id', Auth::user()->church_id)->join('users', 'users.id', 'search_terms.user_id')
        ->select('name', 'search_term','email')->paginate('10');
        return view('after_login.search-term-table', compact('search_term'));
    }
    public function save_search_terms(Request $request) {
        $check_if_element_exists_array = [];
        $search_term = json_decode(searchTerms::where('church_id', Auth::user()->church_id)->value('search_term'));
        foreach ($search_term as $item) {
            array_push($check_if_element_exists_array, $item->search_term);
            if (in_array($request->search_term, $check_if_element_exists_array)) {
                return Redirect()->back()->withErrors("search term is already registered");
            }
        }
        //$nospace_request = str_replace(" ", "", $request->search_term);
        $empty_array = array('search_term' => $request->search_term);
        array_push($search_term, $empty_array);
        //saving new array to the database
        searchTerms::where('church_id', Auth::user()->church_id)->update(array(
            'search_term' => json_encode($search_term),
            'user_id'     => Auth::user()->id
        ));
        return Redirect()->back()->withErrors('Search term added successfully');
    }
    public function delete_search_term(Request $request){
        $search_term = json_decode(searchTerms::where('church_id', Auth::user()->church_id)->value('search_term'));
        unset($search_term[$request->index_to_delete]);
        array_splice($search_term, $request->index_to_delete, 0);
        searchTerms::where('church_id', Auth::user()->church_id)->update(array('search_term' => json_encode($search_term)));
        return Redirect()->back()->withErrors("Search Term was deleted Successfully");
    }
 
    public function incoming_message_drop_down_categories(){
        $drop_down_categories = category::where('church_id', Auth::user()->church_id)
        ->select("title", "user_id", "id")->get();
        return view('after_login.incoming-messages', compact('drop_down_categories'));
    }

    
    public function fetch_data(Request $request)
                {
                if($request->ajax())
                {
                if($request->from_date != '' && $request->to_date != '')
                {
                $data = DB::table('messages')
                    ->whereBetween('date', array($request->from_date, $request->to_date))
                    ->get();
                }
                else
                {
                $data = DB::table('messages')->orderBy('date', 'desc')->get();
                }
                echo json_encode($data);
                }
                }

}
