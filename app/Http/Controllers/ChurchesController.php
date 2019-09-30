<?php

namespace App\Http\Controllers;

use App\User;
use App\churches;
use App\Contacts;
use App\churchdatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChurchesController extends Controller
{
    //Redirect to a page showing all churches and creating all churches
    public function index_showall()
    {
        $churches     = churchdatabase::where('id','>',1)->paginate('10');
        if(auth()->user()->church_id == 1){
        return view('after_login.churches',compact('churches'));
        }
        else{
            return Redirect()->back();
        }
    }
    //Redirect to a page showing churches with this Id
    public function index($id)
    {
        $all_users_in_this_church = User::where('church_id',$id)->get();
        $all_churches = churchdatabase::where('id',$id)->get('id');
        return view('after_login.create-users',compact('all_churches','all_users_in_this_church'));
    }

    //Create a new Church
    public function create(Request $request)
    {
        if(churchdatabase::where('church_name',$request->church_name)->exists())
        {
            return Redirect()->back()->withErrors('Church Name already Registered');
        }
        // if(empty($request->logo)){
        //     return Redirect()->back()->withErrors('Please attach a logo');
        // }
        Contacts::create(array(
            'church_id' => Auth::user()->id,
            'group_id' => 4,
            'created_by' => Auth::user()->id,
            'update_by' =>Auth::user()->id,
            'contact_number' => '[{"Contact":""}]'
        ));
        churchdatabase::create(array(
            'church_name'       =>  $request->church_name,
            'database_name'     =>  $request->database_name,
            'database_url'      =>  $request->url,
            'database_password' =>  $request->password,
            'attached_logo'     =>  $request->logo
        ));
        $church_id = churchdatabase::where('church_name',$request->church_name)->value('id');
        User::create([
            'name'      =>  $request->church_name,
            'email'     =>  strtolower(str_replace(' ', '', $request->church_name)),
            'password'  =>  Hash::make(strtolower(str_replace(' ', '', $request->church_name)) . "123"),
        ]);
        User::where('church_id',null)->update(array(
            'church_id' =>  $church_id,
        ));
        //creating the churches properties file

        $my_file = $request->church_name.'.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        $url = "Url: ".$request->url;
        fwrite($handle, $url);
        $username = "\n UserName: ".$request->church_name;
        fwrite($handle, $username);
        $Password = "\n Password: ".Hash::make($request->password);
        fwrite($handle, $Password);
        return redirect('/church');
    }

    public function create_church_user(Request $request){
        User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  Hash::make($request->password),
        ]);
        User::where('church_id',null)->update(array(
            'church_id' =>  $request->church_id,
        ));
        return Redirect()->back()->withErrors('User Created Successfully');
    }

    //Edit the Church information
    public function edit(Request $request)
    {
        churchdatabase::where('id',$request->church_id)->update(array(
            'background_color'=>$request->background_color
        ));
        return Redirect()->back()->withErrors('Background Color Edited Successfully');
    }

    //Update church as Active
    public function update(Request $request, churches $churches)
    {
        churchdatabase::where('id',$request->church_id)->update(array(
            'status'=>'active'
        ));
    }

    //Mark Church as Deleted
    public function destroy(Request $request)
    {
        churchdatabase::where('id',$request->church_id)->update(array(
            'status'=>'deleted'
        ));
    }

    public function search(Request $request){
        $churches  = churchdatabase::where('church_name',$request->church_name)
        //->orWhere('church_name',$request->church_name)
        // ->orWhere('database_name',$request->church_name)
        ->orWhere('church_name', 'like', '%' . $request->church_name. '%')
        // ->orWhere('database_url', 'like', '%' . $request->church_name. '%')
        // ->orWhere('database_name', 'like', '%' . $request->church_name. '%')
        ->paginate('10');

        return view('after_login.churches',compact('churches'))->with([
            'search_query' => $request->church_name
        ]);
    }

    public function view_church_user($id){
        $view_user = User::where('church_id',$id)
        ->join('church_databases','church_databases.id','users.church_id')
        ->paginate('10');
        return view('after_login.church_user',compact('view_user'));
    }
}
