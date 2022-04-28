<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
class IsAdmin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->isAdmin()){
            redirect()->intended("/admin");
        }else{
            return redirect()->intended('/');
        }
        return $next($request);
    }
}
