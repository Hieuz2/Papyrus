<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // return $next($request);
        }
        return $next($request);

         return redirect('/productsLogin'); // Hoặc chuyển hướng đến trang đăng nhập
    }
}
