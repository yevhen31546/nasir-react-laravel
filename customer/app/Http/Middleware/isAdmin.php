<?php

namespace App\Http\Middleware;
use \App\Helper\Helper as Helper;
use Closure;

class isAdmin
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

        
        
        if (($request->session()->has('role') ) && ($request->session()->get('role') == 'admin' || $request->session()->get('role') == 'sous-admin') ) {
                       
            return $next($request);
        }
        
        return redirect()->guest('/admin/login');

    }
}
