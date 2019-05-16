<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;    
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Setting;
use Session;
use Auth;
use App\User;


class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $settings = Setting::all()->first();
        return view('admin.settings.index', compact('users', 'settings' ));
    }

    
    public function update(SettingsRequest $request)
    {
        $settings = Setting::first();
        // if(request()->site_name != $settings->site_name && request()->contact_number != $settings->contact_number && request()->contact_email != $settings->contact_email && request()->address != $settings->address){
            $settings = Setting::first();
            $settings->site_name = request()->site_name;
            $settings->contact_number = request()->contact_number;
            $settings->contact_email = request()->contact_email;
            $settings->address = request()->address;
            $settings->save();
            Session::flash('success', 'You successfully updated website settings.');
            return redirect('/admin');
        // }
        // else{
        //     Session::flash('warning', 'Nothing Changed, Settings not saved.');
        //     return redirect('/admin');
        // }
        
        
    }

}
