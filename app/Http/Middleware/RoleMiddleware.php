<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check())
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        if (Auth::user()->role->type !== $role)
        {
            return response()->json(['message' => 'Forbidden. You do not have permisson'], 403);
        }

        return $next($request);
    }
}