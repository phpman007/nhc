<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthBackendMidleware
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
        if( Auth::guard('admin')->check() ) {
            return $next($request);
        }
        return redirect('backend/login');
    }
}
