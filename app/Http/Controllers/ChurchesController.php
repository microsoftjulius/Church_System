<?php

namespace App\Http\Controllers;

use App\churches;
use Illuminate\Http\Request;

class ChurchesController extends Controller
{
    //Redirect to a page showing all churches
    public function index()
    {
        return view('after_login.home');
    }

    //Create a new Church
    public function create()
    {
        //
    }

    //Edit the Church information
    public function edit(churches $churches)
    {
        //
    }

    //Update church as Active
    public function update(Request $request, churches $churches)
    {
        //
    }

    //Mark Church as Deleted
    public function destroy(churches $churches)
    {
        //
    }
}
