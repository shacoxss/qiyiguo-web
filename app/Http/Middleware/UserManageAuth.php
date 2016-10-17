<?php

namespace App\Http\Middleware;

use Closure;

class UserManageAuth
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
        if(!(session('user')->user_manage)){
            return redirect('noAuth');
        }
        return $next($request);
    }
}
