<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInternalAdvisors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        $hierarchy = strtolower(session('hierarchy'));
        
        \Log::info('checking hierarchy in session: ' .session('hierarchy'));
        
        if (!session()->has('hierarchy') || strtolower(session('hierarchy')) !== 'internaladvisor'){
            abort(403, 'Acess Denied');

        }
        return $next($request);
    }
}
