<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Is_Admin
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
            
           if(auth()->user()->role =='admin'){
            return $next($request);

        }
            else{
        
        return redirect('/home')->with('error',"You don't have user access.");
    }
        }
        else{
            return redirect('login');
        }
      
    }
}
