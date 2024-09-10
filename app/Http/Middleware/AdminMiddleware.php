<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && auth('sanctum')->user()->role == "admin_principal") {
//            dd(auth('sanctum')->user()->role);
        return $next($request);
    }

        return response()->json(['error' => 'Accès refusé.'], 403);
    }

}
