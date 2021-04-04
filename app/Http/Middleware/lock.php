<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class lock
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

        if(session()->get('locked') === true)
            return redirect()->route('lockscreen');

        return $next($request);
    }
}
