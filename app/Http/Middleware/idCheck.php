<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Migrations\CreateUsersTable;

class idCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //  $user = Auth::users();
        //  dd(Auth::user());
        // if(!Auth::user()){
        //   return response()->redirectTo('/home');
        // }
        return $next($request);
    }
   
}
