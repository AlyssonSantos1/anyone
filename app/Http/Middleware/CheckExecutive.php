<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckExecutive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //check the hierarchy
        \Log::info('checking hierarchy in session: ' .session('hierarchy'));
        
        if (!session()->has('hierarchy') || strtolower(session('hierarchy')) !== 'executive'){
            abort(403, 'Acess Denied');

        }
        return $next($request);
    }
}
