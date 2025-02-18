<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Member;


class LoginController extends Controller
{
    
    public function loginform()
    {
        return view('Login');  
    }

   
    public function loginok(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

      
        $member = Member::where('email', $validated['email'])
                        ->where('name', $validated['name'])
                        ->first();

       
        if (!$member) {
            return back()->with('message', 'The Member Not Found');
        }

        
        session(['role' => $member->role]);
        session(['hierarchy' => $member->hierarchy]);

        
        switch ($member->role) {
            case 'Executive':
                return redirect()->route('Executive.Newusercompany.newuser');
            case 'InternalAdvisor':
                return redirect()->route('create-user');
            case 'Manager':
                return redirect()->route('manager-dashboard');
            case 'Associates':
                return redirect()->route('associates-dashboard');
            case 'User':
                return redirect()->route('user-dashboard');
            default:
                return redirect()->route('login')->with('message', 'Acesso não permitido');
        }
    }

    
}
