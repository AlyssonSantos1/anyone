<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Model\Member;






class LoginController extends Controller
{

    public function loginform (Request $request)
    {
        return view('login');
    }

    public function loginok (Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $member = member::where('email', $validated['email'])->where('email', $validated['email'])->first();
    
        if(!$member){
        
            return 'The user not found';        
        }   

        session::put('member', $Member);

        switch($Member->role)
        {
        case 'Executive':
            return 'You are an Executive, Acess Authorized!';

        case 'InternalAdvisor':
            return 'You are an Internal Advisor, Acess Authorized';

        case 'Manager':
            return 'You are a Manager, Acess Authorized';

        case 'Associates':
            return 'You are an Associate, Acess Authorized';

        case 'User':
            return 'You are a User, Acess Authorized';

        }
    
    }

    public function showExecutive()
    {
        return view('OnlyExecutiveWorkSpace');
    }

    public function showManager()
    {
        return view('OnlyManagerWorkSpace');
    }

    public function showAssociates()
    {
        return view('OnlyAssociatesrWorkSpace');
    }

    public function showInternalAdvisors()
    {
        return view('OnlyInternalAdvisorsWorkSpace');
    }

    public function showDefault()
    {
        return view('UsersWorkspace');
    }





}


