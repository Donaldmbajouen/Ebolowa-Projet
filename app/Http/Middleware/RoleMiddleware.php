<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('login'); // Rediriger vers la page de login si non authentifié
        }

        // Vérifiez si l'utilisateur a le rôle requis

        $role ='utilisateur';
        if (auth()->user()->role !== $role) {
            return response()->json(['message' => 'Accès refusé.'], 403); // Accès refusé
        }

        return $next($request);
    }
}
