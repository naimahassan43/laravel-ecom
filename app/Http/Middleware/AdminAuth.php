<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
         if( $request->session()->has('Admin_Login')){
            // $request->session()->put('Admin_Login',true);
            // $request->session()->put('Admin_Id',$result['0']->id);
            // return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Access Denied');
            return redirect('admin');
        }
        return $next($request);
    }
}
