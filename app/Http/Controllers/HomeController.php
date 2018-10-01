<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //   / $this->middleware('auth');
       // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('welcome');
    }

    /**
     * Show the user page after user login
     *
     * @return void
     */
    public function user() {
        $session_id = Session::getId();
        $user = Auth::user()->id;
        return view('user-home', ['sesija'=>$session_id, 'user'=>$user]);
    }
}
