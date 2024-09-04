<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return response()->json($photos);
    }


    public function create(Request $request)
    {
        $request->validate([
            'photoable_id'=> 'required|integer',
            'photoable_type'=> 'required|string',
            'name'=> 'nullable|string'
        ]);


        $photos = new Photo();
        $photos->photoable_id = $request->photoable_id;
        $photos->photoable_type = $request->photoable_type;
        $photos->name = $request->name;
        $photos->save();

        return response()->json([
            'message' => 'photo ajoute avec succes',
        ]);

    }

    public function show($id)
    {
        $photos = Photo::findOrFail($id);
        return response()->json($photos);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photoable_id'=> 'required|integer',
            'photoable_type'=> 'required|string',
        ]);

        $photos = Photo::findOrFail($id);
        $photos->update($request->all());
        return response()->json(['message' => 'photo mis jour avec succes', 'Photo' => $photos]);
    }

    public function destroy($id)
    {
        $photos = Photo::findOrFail($id);
        $photos->delete();
        return response()->json(['message' => 'photo supprimee avec success']);
    }
}
