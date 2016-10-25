<?php

namespace App\Http\Middleware;

use Closure;

class Auth
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
        if(!session('user')){
            return redirect('auth');
        }elseif( session('user') && empty(session('user')->phone)){
            return redirect('auth/bindingPhone');
        }

        return $next($request);
    }
}
