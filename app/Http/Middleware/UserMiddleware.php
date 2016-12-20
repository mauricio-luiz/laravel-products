<?php

namespace ZarbTest\Http\Middleware;

use Closure;
use Auth;

class UserMiddleware
{
    private static $not_active = 'Usuário não se encontra ativo no sistema';

    public function handle($request, Closure $next)
    {
        if(!$request->user() || $request->user()->active == 0){
            Auth::logout();
            return redirect('/')->with('error', SELF::$not_active);
        }

        session([
            'id' => $request->user()->id,
            'full_name' => $request->user()->full_name,
            'email'   => $request->user()->email,
            'username' => $request->user()->username
        ]);

        return $next($request);
    }
}
