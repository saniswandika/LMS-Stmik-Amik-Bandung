<?php

namespace App\Http\Controllers;

use App\Models\mata_kuliah;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role == 'mahasiswa') { // Role mahasiswa
            return view('adminMHS.mahasiswa');
        } elseif (Auth::user()->role == 'dosen') { // Role pembimbing
            return view('adminpembimbing.pembimbing');
        } elseif (Auth::user()->role == 'admin') { // Role BAAK
            return view('adminBAAK.BAAK');
        } elseif (Auth::user()->role == 'BAPSI') { // Role BAPSI
            return view('adminBAPSI.BAPSI');
        }
    }
   
    
}
