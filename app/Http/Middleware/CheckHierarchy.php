<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckHierarchy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {     
        
        if ($request->is('login') || $request->is('login*')) {
            return $next($request); 
        }   
        
        if (session()->has('member')) {
            $member = session('member');


            if (strtolower(trim($member->hierarchy)) === strtolower(trim($role))) {
                return $next($request);

            }
        }
        return redirect('/');
    }
}
