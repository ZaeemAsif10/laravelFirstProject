<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Employe
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
       
        if(Auth::check()){
            
           if(auth()->user()->role =='employee'){
            return $next($request);
        }
            else{
        
        return redirect('/not-allow')->with('error',"You don't have user access.");
    }
        }
        else{
            return redirect('login');
        }
    }
}
