<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Providers\RouteServiceProvider;

class UserRedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate
     * 
     * \Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(Auth::check()){
            $expiredTime = Carbon::now()->addSeconds(60);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiredTime);
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        if(Auth::check() && Auth::user())
        {
            return $next($request);
        }else{
            return redirect()->route('login');
        }

        
    }
}
