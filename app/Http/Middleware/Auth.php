<?php

namespace App\Http\Middleware;

use App\Model\Message;
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
        //message

        $message['sum'] = Message::where('user_id',session('user')->id)->where('is_del',0)->where('view',0)->count();
        if($message['sum'] > 9){
            $message['sum'] = '9+';
        }
        $info = Message::where('user_id',session('user')->id)->where('is_del',0)->where('view',0)->orderBy('updated_at','desc')->take(3)->get();
        session(['message_sum'=>$message['sum']]);
        session(['message'=>$info]);
        return $next($request);
    }
}
