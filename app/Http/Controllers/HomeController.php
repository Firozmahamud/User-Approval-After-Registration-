<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('welcome',compact('users'));
    }

    public function admin()
    {
        $users = User::all();
        // return view('admin.dashboard',compact('users'));
        return view('home',compact('users'));
    }

    public function user()
    {
        // $users = User::all();
        return view('user.dashboard');
    }


    public function status(Request $request,$id)
    {
        $data = User::find($id);
        if($data->status == 0){
            $data->status = 1;
        }else{
            $data->status = 0;
        }
        $data->save();
        // return'ok';
        // return redirect()->back()->with
        return Redirect::to('/admin_dashboard')->with('message',$data->name.' status has been changed successfully');
    }


}
