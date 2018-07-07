<?php

namespace App\Http\Middleware;

use Closure;

class Kurir
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
                if($request->user()->isKurir()){
                return $next($request);
            } else {
                return redirect('/');
            }
        } else {
                return redirect('/');
        }
    }
}
