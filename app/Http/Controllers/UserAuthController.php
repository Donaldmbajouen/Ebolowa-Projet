<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Nette\Utils\isEmpty;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $registerUserData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|integer',
            'password' => 'required|min:8',
            'role' => 'nullable|in:' . implode(',', UserRole::all()), // Vérifie que le rôle est l'une des valeurs enum
        ]);
        $user = User::create([
            'name' => $registerUserData['name'],
            'email' => $registerUserData['email'],
            'phone_number' => $registerUserData['phone_number'],
            'password' => Hash::make($registerUserData['password']),
            'role' => empty($registerUserData['role']) ? UserRole::USER : $registerUserData['role']
        ]);
        return response()->json([
            'message' => 'Utilisateur cree avec succes ',
        ]);
    }


    public function login(Request $request)
    {
        $loginUserData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8'
        ]);
        $user = User::where('email', $loginUserData['email'])->first();
        if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
            return response()->json([
                'message' => 'données invalides'
            ], 401);
        }
        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'message' => 'connecté avec succes'
        ]);
    }

// logout simple


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Déconnecté avec succès"
        ]);
    }
}


//ici cest le logout en fonction du role donc uniquement les admins peuvent se logout

//    public function logout(Request $request)
//    {
//        // Vérifiez que l'utilisateur est authentifié
//        if ($request->user() && $request->user()->role === UserRole::ADMIN) {
//            // Supprimez les tokens de l'utilisateur
//            $request->user()->tokens()->delete();
//            return response()->json([
//                'message' => 'Déconnecté avec succès.',
//            ]);
//        }
//
//        // Si l'utilisateur n'est pas admin ou n'est pas connecté
//        return response()->json(['message' => 'Accès non autorisé.'], 403);
//    }
//}

