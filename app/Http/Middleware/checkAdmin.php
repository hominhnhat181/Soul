<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
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
        if (Auth::guest()) {
            return redirect()->route('login');
        } elseif (User::where('is_admin', '!=', 1)) {
            return redirect()->route('home');
        }
        return $next($request);


        // if(User::where('is_admin' ,'==', 1)  ){
        //     return $next($request);
        // }else{
        //     return redirect()->route('home');

        // }
    }
}
