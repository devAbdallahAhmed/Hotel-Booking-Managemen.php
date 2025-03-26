<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckForLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admins/login')) {
            if (Auth::guard('admin')->check()) {
                return redirect()->route('admins.dashboard');
            }
        }
        return $next($request);
    }
}
