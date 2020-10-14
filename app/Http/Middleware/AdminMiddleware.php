<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->usertype == 'admin'){
                return $next($request);
            }
            else{
                redirect('/home')->with('status','You are in dashboard Panel');
            }

        }else{
            return $next($request);
        }



    }
}
