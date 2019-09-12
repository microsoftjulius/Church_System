<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContactsController extends Controller
{
    //It redirects to a page showing all contacts
    public function index()
    {
        $contacts = Contacts::join('church_databases','church_databases.id','contacts.church_id')
        ->join('users','users.id','contacts.created_by')
        ->where('users.church_id',Auth::user()->church_id)->get();
        return view('after_login.contacts',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contacts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }

    public function view_for_group($id){
        $get_group_contacts = Contacts::join('Groups','contacts.group_id','Groups.id')
        ->join('church_databases','church_databases.id','contacts.church_id')
        ->join('users','users.id','contacts.created_by')
        ->where('group_id',$id)->where('contacts.church_id',Auth::user()->church_id)->paginate('10');
        return view('after_login.contacts',compact('get_group_contacts'));
    }

    //save contact to group
    public function save_contact_to_group($id, Request $request){
        $contact_array = json_decode(Contacts::where('contacts.id',$id)->value('contact_number'));
        foreach($contact_array as $contact){
            if($contact->Contact == ""){
                $contact->Contact = $request->contact;
            }
        }
        $nospace_request = str_replace(" ","",$request->contact);
        $empty_array = array('Contact'=>$nospace_request);
        array_push($contact_array, $empty_array);
        //saving new array to the database
        Contacts::where('contacts.id',$id)->update(array(
            'contact_number' => json_encode($contact_array)
        ));
        return Redirect()->back();
        }
}
