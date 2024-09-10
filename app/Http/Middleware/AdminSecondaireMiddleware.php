<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminSecondaireMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
//        dd(Auth::check() );
        if (Auth::check() && auth('sanctum')->user()->role == "admin_secondaire") {
            return $next($request);
        }

        return response()->json(['error' => 'Accès refusé.'], 403);
    }

}
