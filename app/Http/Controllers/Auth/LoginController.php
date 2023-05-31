<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->only('kode_karyawan', 'password');
        if(Auth::attempt(array('kode_karyawan' => $input['kode_karyawan'], 'password' => $input['password']))){
            if(Auth::user()->status == "Admin"){
                return redirect()->route('adminHome');
            }else if(Auth::user()->status == "Karyawan"){
                return redirect()->route('karyawanHome');
            }else if(Auth::user()->status == "Pemilik"){
                return redirect()->route('pemilikHome');
            }else if(Auth::user()->status == "Karyawan Pengirim"){
                return redirect()->route('karyawanPengirimHome');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Maaf, Email dan/atau Password anda salah.');
        }
    }
}
