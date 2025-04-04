<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $member = Auth::user();
            
            session(['member' => $member]);
           
            switch (strtolower(trim($member->hierarchy))) {
                case 'executive':
                    return redirect()->route('executive.index');
                case 'internaladvisor':
                    return redirect()->route('internaladvisor.index');
                case 'manager':
                    return redirect()->route('managers.index');
                case 'associate':
                    return redirect()->route('associates.index');
                case 'user':
                    return redirect()->route('user.index');
                default:
                    return redirect()->intended('/');
            }
            
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas são inválidas.',
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
