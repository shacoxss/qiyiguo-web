<?php

namespace App\Http\Middleware;

use Closure;

class MasterAuth
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
        if(!session('user')->master){
            return redirect('noAuth');
        }
        return $next($request);
    }
}
