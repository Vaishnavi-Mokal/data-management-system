<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            // verify user role i.e. only admin and super admin have access..
            
            if(Auth::user()->role == 'Superadmin' || Auth::user()->role == 'User Admin'){
                return $next($request);
            }
            else{
                return redirect('home')->with('status',"Un-Autherized !! Access denied");
            }
        }
        else{
            return redirect('/login')->with(Auth::logout());
        }
    }
}
