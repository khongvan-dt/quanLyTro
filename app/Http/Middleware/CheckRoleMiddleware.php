<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle($request, Closure $next, $role)
     {
        if ($request->user()->role == $role) {
            return $next($request);
        }
     
         // Nếu tham số $role không phải ':user' hoặc ':admin', chuyển hướng người dùng tới tuyến đường 'pageError400'.
         return redirect()->route('pageError400');
     }
     
}
