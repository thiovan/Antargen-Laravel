<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
            if($request->user()->isPelanggan()){
                return $next($request);
            } else if($request->user()->isManajer()){
                return redirect('/manajer');
            } else if($request->user()->isAdminTransaksi()){
                return redirect('/admintransaksi');
            } else if($request->user()->isAdminToko()){
                return redirect('/admintoko');
            }
        } else {
                return redirect('/login');
        }
    }
}
