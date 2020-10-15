<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class ManagerMiddleware
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
        $usertype = Auth::user()->usertype;

        if( $usertype == 'manager' && $usertype != null)
        {
            return $next($request);

        }else if( $usertype == 'admin' && $usertype != null)
        {
            return redirect('admin');
        }
        else{

            return redirect('home');
        }


    }
}
