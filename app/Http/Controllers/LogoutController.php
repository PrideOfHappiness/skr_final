<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;


class LogoutController extends Controller
{
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function aboutUs(){
        return view('aboutUs');
    }
}
