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
         // dd($role); // Dòng này có thể được sử dụng để gỡ lỗi
     
         // Kiểm tra xem tham số $role có giá trị ':user' hoặc ':admin' không
         if ($role === ':user' || $role === ':admin') {
             // Kiểm tra xem người dùng đã xác thực (đã đăng nhập) chưa
             if (Auth::check()) {
                 // Nếu người dùng đã xác thực, cho phép họ tiếp tục tới middleware tiếp theo hoặc tới tuyến đường mong muốn.
                 return $next($request);
             } else {
                 // Nếu người dùng chưa xác thực, chuyển hướng họ tới tuyến đường 'login'.
                 return redirect()->route('login');
             }
         }
     
         // Nếu tham số $role không phải ':user' hoặc ':admin', chuyển hướng người dùng tới tuyến đường 'pageError400'.
         return redirect()->route('pageError400');
     }
     
}
