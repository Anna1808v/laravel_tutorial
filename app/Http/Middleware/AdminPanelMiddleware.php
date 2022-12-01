<?php

namespace App\Http\Middleware;

use Closure;

class AdminPanelMiddleware
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
        // if (auth()->user()->role !== 'admin') {
        //     return redirect()->route('home');
        // }
        if (!auth()->user()){
            return redirect('/login');
        } 
        if (auth()->user()->role !== 'admin'){
            return redirect('/');
        }
        return $next($request);
    }
}
