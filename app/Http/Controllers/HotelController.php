<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = Hotel::all();
        return response()->json($hotel);
    }


    public function create(Request $request)
    {
        $request->validate([
        'name'=> 'required|string',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'type' =>'integer|max:6',
        'description'=> 'required|string',
        'longitude'=> 'required|string',
        'lattitude' => 'required|string',
        'gerant_id' => 'required|exists:users,id'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/hotels', 'public');
        }
        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->type = $request->type;
        $hotel->longitude = $request->longitude;
        $hotel->lattitude = $request->lattitude;
        $hotel->image = $imagePath;
        $hotel->gerant_id = $request->gerant_id;
        $hotel->save();

        return response()->json([
            'message' => 'Hotel ajoute avec succes',
        ]);

    }


    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required|string',
            'image' =>'required|string',
            'type' =>'required|integer',
            'description'=> 'required|string',
            'longitude'=> 'required|string',
            'lattitude' => 'required|string'
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return response()->json(['message' => 'Hotel mis jour avec succes', 'hotel' => $hotel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return response()->json(['message' => 'Hotel supprimee avec success']);
    }
}
