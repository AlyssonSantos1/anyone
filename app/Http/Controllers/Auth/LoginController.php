<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin (){
        return view('AuthLogin.Login');
    }

    public function login(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $member = Member::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first();

        if($member){
            session(['user_id' => $member->id, 'hierarchy' => $member->hierarchy]);

            if($member->hierarchy === 'executive')
            return view('Executive.Newusercompany.newuser');
        }
            return view('Executive.Newusercompany.newuser');

            return 'User not found';

        }
        
        
    }

