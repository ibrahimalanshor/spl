<?php

namespace Ibrahimalanshor\Spl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ibrahimalanshor\Spl\Facades\AccessInfo;

/**
 * HasServices
 */
class HasServices
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$services)
    {
        if (!AccessInfo::hasService($services)) {
            return response()->json([
                "message" => "You dont have access to this service"
            ], 401);
        }

        return $next($request);
    }
}
