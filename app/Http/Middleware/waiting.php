<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class waiting
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
        if(auth()->user()->status=='0'){

            return redirect()->route('waiting.page')     ;
        }
        return $next($request);
    }
}
