<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckProfileIsCompleted
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
        // return auth()->user()->profile()->completed;
        if(Auth::check()){
            // dd(auth()->user()->profile->completed);
            // dd('tttttttttttttttttt');
            if(auth()->user()->profile->completed == false){
                return redirect()->route('profile-completed', auth()->user()->profile->id);
            }
        }

        return $next($request);
    }
}
