<?php

namespace App\Http\Middleware\Backend;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::get('admin_id')) {
            return redirect('/admin/login');
        } else {
            return $next($request);
        }
    }
}
