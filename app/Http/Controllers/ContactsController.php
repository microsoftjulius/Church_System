<?php
namespace App\Http\Controllers;
use App\Contacts;
use App\Exports\ContactsExport;
use App\Groups;
use App\Imports\ContactsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactsController extends Controller {
    //It redirects to a page showing all contacts
    public function index() {
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacts $contacts) {
        //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts) {
        //

    }
    public function view_for_group($id) {
        $get_group_contacts = Contacts::join('Groups', 'contacts.group_id', 'Groups.id')->join('church_databases', 'church_databases.id', 'contacts.church_id')->join('users', 'users.id', 'contacts.created_by')->where('group_id', $id)->where('contacts.church_id', Auth::user()->church_id)->paginate(10);
        return view('after_login.contacts', compact('get_group_contacts'));
    }
    //save contact to group
    public function save_contact_to_group($id, Request $request) {
        if (empty($request->contact)) {
            return Redirect()->back();
        }
        if (ctype_alpha($request->contact)) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        }
        if (strpos($request->contact, '.') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '!') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '@') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '#') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '$') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '%') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '^') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '&') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '*') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '"') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, ',') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, ':') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '\'') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '?') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, ';') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '/') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '}') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '{') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '[') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, ']') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '-') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '_') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '=') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '+') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, '(') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strpos($request->contact, ')') == true) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        } elseif (strlen($request->contact) > 12) {
            return Redirect()->back()->withErrors("The Number count is supposed to be exactly 12");
        } elseif (strlen($request->contact) < 12) {
            return Redirect()->back()->withErrors("The Number count is supposed to be exactly 12");
        } elseif ($request->contact[0] != 2) {
            return Redirect()->back()->withErrors("Required numbers only start with 256");
        } elseif ($request->contact[1] != 5) {
            return Redirect()->back()->withErrors("Required numbers only have 5 as their second digit");
        } elseif ($request->contact[2] != 6) {
            return Redirect()->back()->withErrors("Required numbers only have 6 as their third number");
        }
        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $request->contact)) {
            return Redirect()->back()->withErrors("Please put a correct phone number with no plus, syntax used is: 256*********");
        }
        $check_if_element_exists_array = [];
        $contact_array = json_decode(Contacts::where('contacts.group_id', $id)->value('contact_number'));
        foreach ($contact_array as $item) {
            array_push($check_if_element_exists_array, $item->Contact);
            if (in_array($request->contact, $check_if_element_exists_array)) {
                return Redirect()->back()->withErrors("Contact is already registered under this group");
            }
        }
        $nospace_request = str_replace(" ", "", $request->contact);
        $empty_array = array('Contact' => $nospace_request, 'name' => $request->name);
        array_push($contact_array, $empty_array);
        //saving new array to the database
        Contacts::where('contacts.group_id', $id)->update(array('contact_number' => json_encode($contact_array)));
        Groups::where('id', $id)->update(array('number_of_contacts' => count($contact_array)));
        return Redirect()->back();
    }
    public function remove_element_from_an_array($group_id, Request $request) {
        $contact_array = json_decode(Contacts::where('contacts.group_id', $group_id)->value('contact_number'));
        unset($contact_array[$request->index_to_delete]);
        array_splice($contact_array, $request->index_to_delete, 0);
        //return (json_encode($contact_array));
        Contacts::where('contacts.group_id', $group_id)->update(array('contact_number' => json_encode($contact_array)));
        //$counted = json_decode($contact_array);
        Groups::where('id', $group_id)->update(array('number_of_contacts' => count($contact_array)));
        return Redirect()->back()->withErrors("Contact was deleted Successfully");
    }
    public function import() {
        Excel::import(new ContactsImport, request()->file('file'));
        return back();
    }
    public function export() {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
