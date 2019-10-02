<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\church_user;
use Illuminate\Support\Facades\Auth;
class ChurchUserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $display_all_church_users = User::Where('email', $request->search)->orWhere('name', 'like', '%' . $request->search . '%')->where('church_id', 1)->paginate('10');
        return view('after_login.users', compact('display_all_church_users'))->with(['search_query' => $request->search]);
        //return Auth::user()->church_id;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
        if (User::where('email', $request->username)->exists()) {
            return Redirect()->back()->withErrors('Username already taken, kindly choose another username');
        }
        User::create(array('name' => $request->first_name . " " . $request->last_name, 'email' => $request->username, 'password' => Hash::make($request->password), 'church_id' => Auth::user()->church_id));
        return redirect('/user');
    }
    public function display_user_password() {
        $display = User::where('church_id', auth()->user()->church_id)->get();
        return view('after_login.view-passwords', compact('display'));
    }
    public function store_users_password(Request $request) {
        $get_users_current_password = User::find(Auth::user()->id)->password;
        $current_password = $request->current_password;
        if ($request->new_password == $request->confirm_password) {
            if (Hash::check($current_password, $get_users_current_password)) {
                User::where("id", Auth::user()->id)->update(array('password' => Hash::make($request->new_password)));
                return Redirect()->back()->withErrors("Password update was successful");
            } else {
                return Redirect()->back()->withErrors("Incorrect password has been supplied");
            }
        } else {
            return Redirect()->back()->withErrors("Make sure the two new passwords match");
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function show() {
        //
        $display_all_church_users = User::where('church_id', auth()->user()->church_id)->paginate('10');
        return view('after_login.users', compact('display_all_church_users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function edit(church_user $church_user) {
        //

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, church_user $church_user) {
        //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\church_user  $church_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(church_user $church_user) {
        //

    }
}
