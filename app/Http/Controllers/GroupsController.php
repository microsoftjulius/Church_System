<?php

namespace App\Http\Controllers;

use App\Groups;
use App\Contacts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //It redirects to a page showing all contacts
    public function index()
    {
    $contacts = Groups::join('church_databases','church_databases.id','Groups.church_id')
    ->join('users','users.id','Groups.created_by')
    ->where('users.church_id',Auth::user()->church_id)
    ->get();
    return view('after_login.contacts-groups',compact('contacts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_group(Request $request)
    {
        Groups::create(array(
            'group_name'      =>$request->group_name,
            'church_id' => Auth::user()->church_id,
            'created_by' => Auth::user()->id
        ));
        return redirect('/contact-groups');
    }

    public function search_group(Request $request)
    {
        $contacts = Groups::join('church_databases','church_databases.id','Groups.church_id')
        ->join('users','users.id','Groups.created_by')
        ->where('Groups.group_name',$request->group_name)
        ->where('users.church_id',Auth::user()->church_id)->get();
        return view('after_login.contacts-groups',compact('contacts'));
    }

    public function show_form(){
        return view('after_login.add-group');
    }
}
