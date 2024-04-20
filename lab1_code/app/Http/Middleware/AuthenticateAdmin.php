<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('isAdmin')) {
            return redirect('/admin/log_admin');
        }
        return $next($request);
    }
}
