<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\church_user;
use Illuminate\Support\Facades\Auth;

class ChurchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $display_all_church_users = User::where('church_id',auth()->user()->church_id)
        ->Where('name','like', '%' . $request->search. '%')
        ->paginate('10');
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
        User::create(array(
            'name'       =>  $request->first_name ." " . $request->last_name ,
            'email'      =>  $request->username,
            'password'   =>  Hash::make($request->password),
            'church_id'  =>  Auth::user()->church_id
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
        $display_all_church_users = User::where('church_id',auth()->user()->church_id)
        ->paginate('10');
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
