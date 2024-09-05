<?php

namespace App\Http\Controllers;

use App\Models\siteTouristique;
use Illuminate\Http\Request;

class SiteTouristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site_touristique = siteTouristique::all();
        return response()->json($site_touristique);
    }


    public function create(Request $request)
    {
        $request->validate([
            'name'=> 'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'=> 'required|string',
            'longitude'=> 'required|string',
            'lattitude' => 'required|string',
            'gerant_id' => 'required|exists:users,id'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/SiteTouristique', 'public');
        }
        $site_touristique = new siteTouristique();
        $site_touristique->name = $request->name;
        $site_touristique->description = $request->description;
        $site_touristique->longitude = $request->longitude;
        $site_touristique->lattitude = $request->lattitude;
        $site_touristique->image = $imagePath;
        $site_touristique->gerant_id = $request->gerant_id;
        $site_touristique->save();

        return response()->json([
            'message' => 'Site touristique ajoute avec succes',
        ]);

    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $site_touristique = siteTouristique::findOrFail($id);
        return response()->json($site_touristique);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string',
            'image' =>'required|string',
            'description'=> 'required|string',
            'longitude'=> 'required|string',
            'lattitude' => 'required|string'
        ]);

        $site_touristique = siteTouristique::findOrFail($id);
        $site_touristique->update($request->all());
        return response()->json(['message' => 'Hotel mis jour avec succes', 'hotel' => $site_touristique]);
    }

    public function destroy($id)
    {
        $site_touristique = siteTouristique::findOrFail($id);
        $site_touristique->delete();
        return response()->json(['message' => 'Hotel supprimee avec success']);
    }
}
