<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminToko
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
        if (Auth::check()) {
                if($request->user()->isAdminToko()){
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
                return redirect('/');
        }
    }
}
