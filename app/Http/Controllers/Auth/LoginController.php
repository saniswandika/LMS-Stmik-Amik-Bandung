<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = null;
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated() {
        if (Auth::check()) {
            if (Auth::user()->role=='mahasiswa'){
                return redirect()->route('utama');
            } else  if (Auth::user()->role=='dosen'){
                return redirect()->route('utamadsn');
            } else  if (Auth::user()->role=='admin'){
                return redirect()->route('utamaadm');
            }
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string', 
            'g-recaptcha-response' => 'required|captcha'
        ]);
        Alert::success('Anda Berhasil Login');
        return redirect()->back()->with('status', 'mahasiswa sudah berhasil di update');
        }
    }


    
