<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        echo"<h3 class='text-primary'>We are now in a validuser middleware".$role."</h3>";
       

        if(Auth::check() &&  Auth::user()->role == $role){
            return $next($request);
        }else{
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    }
}
