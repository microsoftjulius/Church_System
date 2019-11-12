<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PackagesModel;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
{
    public function getChurchPackages(){
        if(Auth::user()->church_id == 1){
            $all_packages = PackagesModel::join('subscribed_for_messages','subscribed_for_messages.id','packages.category_id')->paginate('10');
        }else{
            $all_packages = PackagesModel::join('subscribed_for_messages','subscribed_for_messages.id','packages.category_id')
            ->where('church_id',Auth::user()->church_id)->paginate('10');
        }
        return view('after_login.packages',compact('all_packages'));
    }

    public function createAutomaticPackage(Request $request){
        $church_id = 1;
        $category_id = 2;
        PackagesModel::create(array(
            'church_id'      => $church_id,
            'category_id'    => $category_id,
            'contact_number' => $request->contact_number,
            'time_frame'     => $request->time_frame,
            'Amount'         => $request->Amount,
            'type'           => 'Automatic'
        ));
        return redirect('/packages')->withErrors("New Package Subscription has been created");
    }

    public function createManualSubscription(Request $request){
        //$category_id = $request->category_id;
        $category_id = 2;
        PackagesModel::create(array(
            'church_id'      => Auth::user()->church_id,
            'category_id'    => $category_id,
            'contact_number' => $request->contact_number,
            'time_frame'     => $request->time_frame,
            'Amount'         => $request->Amount,
            'type'           => 'Manual'
        ));
        return redirect('/packages')->withErrors("New Package Subscription has been created");
    }
}
