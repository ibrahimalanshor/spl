<?php

namespace Ibrahimalanshor\Spl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ibrahimalanshor\Spl\Facades\AccessInfo;

/**
 * HasRoles
 */
class HasRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!AccessInfo::hasRole($roles)) {
            return response()->json([
                "message" => "You dont have role to access"
            ], 401);
        }

        return $next($request);
    }
}
