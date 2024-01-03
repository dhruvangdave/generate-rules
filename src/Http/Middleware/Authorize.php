<?php

namespace Dhruvang\GenerateRules\Http\Middleware;

use Closure;
use Dhruvang\GenerateRules\GenerateRules;
use Illuminate\Http\Request;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     */
    public function handle(Request $request, Closure $next)
    {
        return GenerateRules::check($request) ? $next($request) : abort(403);
    }
}
