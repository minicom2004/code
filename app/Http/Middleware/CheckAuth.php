<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check() || Auth::user()->role != 'admin')
            return abort(403, "User không có quyền truy cập vào đây !");
        # code...
        return $next($request);

        // if (!Auth::check() || Auth::admin()->role != "user")
        //     return abort(403, "Admin không có quyền truy cập vào đây !");
        // return $next($request);
        # code...

    }
}
