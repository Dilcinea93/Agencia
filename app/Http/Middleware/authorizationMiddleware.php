<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class authorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $status_auth)
    {
        if ($status_auth!='autorizado') {
            return redirect('../index.php')->with('error','You have no permission for this page!');
        }
        return $next($request);

    }
}
