<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthPendaftaran
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('pendaftaran_id')) {
            return redirect()->route('login.form')->with('error', 'Silakan login terlebih dahulu.');
        }
        return $next($request);
    }
}
