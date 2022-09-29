<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaikrsController extends Controller
{
    public function nilaikrs()
    {
        return view('adminMHS.nilaidankrs');
    }
}
