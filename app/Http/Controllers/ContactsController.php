<?php
namespace App\Http\Controllers;

use App\Contacts;
use App\Exports\ContactsExport;
use App\Groups;
use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ContactsController extends Controller
{
    //It redirects to a page showing all contacts
    public function index()
    {
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
    public function view_for_group($id)
    {
        $get_group_contacts = Contacts::join('Groups', 'contacts.group_id', 'Groups.id')->join('church_databases', 'church_databases.id', 'contacts.church_id')->join('users', 'users.id', 'contacts.created_by')->where('group_id', $id)->where('contacts.church_id', Auth::user()->church_id)->paginate('10');
        return view('after_login.contacts', compact('get_group_contacts'));
    }
    //save contact to group
    public function save_contact_to_group($id, Request $request)
    {
        if (empty($request->contact)) {
            return Redirect()->back();
        }
        $contact_array = json_decode(Contacts::where('contacts.group_id', $id)->value('contact_number'));
        foreach ($contact_array as $contact) {
            // if ($contact->Contact == "") {
            //     $contact->Contact = $request->contact;
            // }
        }
        $nospace_request = str_replace(" ", "", $request->contact);
        $empty_array     = array(
            'Contact' => $nospace_request
        );
        array_push($contact_array, $empty_array);
        //saving new array to the database
        Contacts::where('contacts.group_id', $id)->update(array(
            'contact_number' => json_encode($contact_array)
        ));
        Groups::where('id', $id)->update(array(
            'number_of_contacts' => count($contact_array)
        ));
        return Redirect()->back();
    }
    public function import()
    {
        Excel::import(new ContactsImport, request()->file('file'));
        return back();
    }
    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
