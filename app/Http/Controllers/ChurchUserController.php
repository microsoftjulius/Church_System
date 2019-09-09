<?php

namespace App\Http\Controllers;

use App\church_user;
use Illuminate\Http\Request;

class ChurchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
            $search = $request->search;
        
            //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
        
            $display_all_church_users = church_user::where('first_name',$search)->get();
            return view('after_login.users', compact('display_all_church_users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        church_user::create(array(
            'first_name'       =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'username'      =>  $request->username,
            'password' =>  $request->password
        ));
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $display_all_church_users = church_user::all()
        ->where('church_id',auth()->user()->id);
        //->paginate(10);
        return view('after_login.users',['display_all_church_users'=>$display_all_church_users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function edit(church_user $church_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, church_user $church_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(church_user $church_user)
    {
        //
    }
}
