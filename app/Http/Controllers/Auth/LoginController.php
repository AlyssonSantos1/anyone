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

            $allowedHierarchies = ['executive', 'Manager', 'InternalAdvisor', 'Associate', 'User'];

            if (in_array(strtolower($member->hierarchy), array_map('strtolower', $allowedHierarchies))){       
            return view('Welcome');
            }
            
        }
        return 'User not Found';
    }
}
        


