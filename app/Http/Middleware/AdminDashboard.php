<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Make sure is user role is 0 (not admin)
        if(Auth::check() && Auth::user()->role==1 && Auth::user()->name == $request->name)
        {
            return $next($request);
        }

        //If not. redirect (who ever trying to navigated to user dashboard ) back to home 
        //page with access denied message
        // dd('Access Denied');
        return redirect()->route('welcome')->with('error', 'Admin Dashboard: You do not have permission to access this page');
    }
}
