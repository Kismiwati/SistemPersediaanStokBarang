<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo "Halaman ini di akses setelah dipanggil middlewere";
        if (Auth::check()) {
            //ketika sudah login, lanjut keroute berikutnya
            return $next($request);
        }
        return redirect('/')->withErrors('Anda harus login terlebih dahulu');
    }
}
