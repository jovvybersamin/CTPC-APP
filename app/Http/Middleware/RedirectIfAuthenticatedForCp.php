<?php

namespace OneStop\Http\Middleware;

use Closure;
use OneStop\Core\API\User;

class RedirectIfAuthenticatedForCp
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
        if(User::get()){
            return redirect('/cp/users');
        }

        return $next($request);
    }
}
