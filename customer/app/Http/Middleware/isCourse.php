<?php

namespace App\Http\Middleware;
use \App\Helper\Helper as Helper;
use Closure;

class isCourse
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

        
        
        if (($request->session()->has('statut_course') ) && ($request->session()->get('statut_course') == 'ok') ) {
                       
            return $next($request);
        }
        
        return redirect()->guest('/course');

    }
}
