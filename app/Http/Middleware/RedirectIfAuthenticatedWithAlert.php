<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedWithAlert
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->route('tickets.index')
                ->with('warning', 'Silakan logout terlebih dahulu sebelum masuk ke halaman login.');
        }

        return $next($request);
    }
}
