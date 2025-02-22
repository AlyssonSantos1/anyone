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

    public function login(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $member = Member::where('name', $request->name)
                        ->where('email', $request->email)
                        ->first();

    if ($member) {
        session(['user_id' => $member->id, 'hierarchy' => $member->hierarchy]);
        \Log::info('User logged in with hierarchy: ' . session('hierarchy'));

        
        switch (strtolower($member->hierarchy)) {
            case 'executive':
                return view('Executive.loginexecutive'); 
            case 'internaladvisor':
                return view('InternalAdvisors.loginadvsior');
            case 'manager':
                return view('Managers.loginmanager');
            case 'associate':
                return view('Associates.loginassociates');
            case 'user':
                return view('Users.loginuser');
            default:
                return 'Acess Denied';
            }
        }
    
            return 'User not found';
    }
}
        


