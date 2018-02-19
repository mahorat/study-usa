<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class quest
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
        if(!Auth::user() or Auth::user()->id_schools_name == 0 ){
            return $next($request);
        }
        return redirect('/');
    }
}
