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
        return view('home',compact('users'));
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
        return Redirect::to('home')->with('message',$data->name.'status has been changed successfully');
    }


}
