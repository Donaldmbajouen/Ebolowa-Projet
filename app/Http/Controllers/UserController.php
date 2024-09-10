<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function main_user(){
        return view ('Users/Home');
    }

    public function site_touristique(){
        return view ('Users/SiteTouristique');
    }
    public function reserver_site_touristique(){
        return view ('Users/ReservesiteTouristique');
    }


    public function historique(){
        return view ('Users/TimelinePage');
    }
    public function Hotels(){
        return view('Users/Hotels');
    }


    //crud user Ok test

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function create(Request $request)
    {
        $validatedata = $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',

            'role' => 'nullable|in:' . implode(',', UserRole::all()), // Vérifie que le rôle est l'une des valeurs enum
            'phone_number' => 'required|string',
            'statut' => 'boolean',
        ]);

        $statut_defaut=true;
        $role_defaut="utilisateur";

        $users = new User();
        $users->name = $request->name;
//        $users->role = $validatedata['role'];
//        $users->role = $request->role;

        $statut = empty($request->statut)? $statut_defaut:$validatedata['statut'];
        $role = empty($request->role)? $role_defaut:$validatedata['role'];

        $users->statut = $statut;
        $users->role = $role;
        $users->phone_number = $request->phone_number;
        $users->email = $request->email;
        $users->password = Hash::make($validatedata['password']);

        $users->save();

        return response()->json([
            'message' => 'User ajoute avec succes',
        ]);

    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    public function update(Request $request, $id)
    {
        $validatedata = $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'nullable|in:' . implode(',', UserRole::all()), // Vérifie que le rôle est l'une des valeurs enum
            'phone_number' => 'required|string',
            'statut' => 'boolean',
        ]);

        $users = User::findOrFail($id);
        $users->update($request->all());
        return response()->json(['message' => 'users mis jour avec succes', 'users' => $users]);
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return response()->json(['message' => '$users supprimee avec success']);
    }

}
