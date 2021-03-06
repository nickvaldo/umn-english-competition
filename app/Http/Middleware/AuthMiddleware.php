<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        /* Admin */
        if(strcmp($role,"admin") == 0){
          if(!$request->session()->has('admin')){
            return redirect()->route('admin_login');
          }
          else{
            return $next($request);
          }
        }
        /* User */
        if(strcmp($role,"user") == 0){
          if(!$request->session()->has('user')){
            return redirect()->route('user_login');
          }
          else{
            return $next($request);
          }
        }
    }
}
