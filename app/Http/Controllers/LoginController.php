<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function truelogin (Request $request)
    {
        return view('login');
    }

    public function loginok (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
    }

    
}


