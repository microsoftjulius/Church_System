<?php

namespace App\Http\Controllers;

use App\churches;
use Illuminate\Http\Request;

class ChurchesController extends Controller
{
    //Redirect to a page showing all churches and creating all churches
    public function index()
    {
        return view('after_login.home');
    }

    //Create a new Church
    public function create(Request $request)
    {
        churches::create(array(
            'church_name' => $request->church_name
        ));
        return Redirect()->back()->withErrors('Church Created Successfully');
    }

    //Edit the Church information
    public function edit(Request $request)
    {
        churches::where('id',$request->church_id)->update(array(
            'background_color'=>$request->background_color
        ));
        return Redirect()->back()->withErrors('Background Color Edited Successfully');
    }

    //Update church as Active
    public function update(Request $request, churches $churches)
    {
        churches::where('id',$request->church_id)->update(array(
            'status'=>'active'
        ));
    }

    //Mark Church as Deleted
    public function destroy(Request $request)
    {
        churches::where('id',$request->church_id)->update(array(
            'status'=>'deleted'
        ));
    }
}
