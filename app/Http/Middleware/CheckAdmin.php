<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if(auth()->user()->user_type_id == 0){
            return $next($request);
        }
        return redirect('home')->with('error','You have not admin access');
        //return $next($request);
    }
}
