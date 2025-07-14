<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CheckUserLevel
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
        // Asumsikan Anda memiliki properti `level` pada model User untuk memeriksa level pengguna
        if (auth()->check() && auth()->user()->level == 'pic') {
            // Arahkan ke halaman 503 jika level user adalah 'pic'
            abort(503);
        }

        return $next($request);
    }
}
