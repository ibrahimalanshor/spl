<?php

namespace Ibrahimalanshor\Spl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ibrahimalanshor\Spl\Facades\AccessInfo;

/**
 * HasPermissions
 */
class HasPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        if (!AccessInfo::hasPermission($permissions)) {
            return response()->json([
                "message" => "You dont have permission to access"
            ]);
        }

        return $next($request);
    }
}

