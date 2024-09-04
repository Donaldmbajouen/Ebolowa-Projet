<?php

namespace App\Http\Controllers;

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


    //crud user

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
            'role' => 'string',
            'phone_number' => 'required|string',
        ]);

        $statut_defaut=true;

        $users = new User();
        $users->name = $request->name;
        $users->role = $request->role;

        $statut = empty($validatedata['statut'])? $statut_defaut:$request->statut;

        $users->statut = $statut;
        $users->phone_number = $request->phone_number;
        $users->email = $request->email;
        $users->password = $request->password;
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
        $request->validate([
            'statut'=> 'required|boolean',
            'name'=> 'required|string',
            'email' => 'required|integer|email|unique',
            'password' => 'required|string',
            'role' => 'required|string',
            'phone_number' => 'required|string',
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
