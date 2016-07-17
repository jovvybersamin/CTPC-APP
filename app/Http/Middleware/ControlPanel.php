<?php

namespace OneStop\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use OneStop\Core\API\User;

class ControlPanel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

        if( ! User::hasRole($role)){
            return redirect()
                ->route('home')
                ->withError('Error.');
        }

        return $next($request);
    }
}
