<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminOwner
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
        if(auth()->user()->user_type_id === 0 || auth()->user()->user_type_id === 1){
            return $next($request);
        }
        return redirect('home')->with('error','You have no admin access');
        //return $next($request);
    }
}
