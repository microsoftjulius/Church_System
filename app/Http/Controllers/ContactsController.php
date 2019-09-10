<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
