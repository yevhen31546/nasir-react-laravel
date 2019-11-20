<?php

namespace App\Http\Middleware;
use \App\Helper\Helper as Helper;
use Illuminate\Support\Facades\Auth;
use Closure;

class isConnect
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

        //return $next($request);
        //var_dump($response);
        
        if (($request->session()->has('role_user') ) && ($request->session()->get('role_user') == 'user') ) {
            
            return redirect('/');
        }
        $data['statut_course'] = "ko";
        $data['code']=401;
             //return $data;
        //return response($data, 200);
        //dd('fff');
        return $next($request);

    }
}
