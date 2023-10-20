<?php

namespace Ibrahimalanshor\Spl\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Ibrahimalanshor\Spl\Facades\AccessInfo;

/**
 * HasAccessInfo
 */
class HasAccessInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                "message" => "Access Token Required"
            ], 401);
        }

        try {
            $payload = JWT::decode($token, new Key(config('spl.secret'), 'HS256'));

            AccessInfo::set($payload);

            return $next($request);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Unauthorized"
            ], 401);
        }
    }
}
