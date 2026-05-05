<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user udah login DAN role-nya sesuai sama yang diminta
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Kalau role kaga sesuai, usir ke halaman error 403 atau kembali ke asal
        abort(403, 'Akses Ditolak! Anda tidak memiliki izin untuk halaman ini.');
    }
}