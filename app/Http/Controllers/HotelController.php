<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel = new Hotel();
        $hotel->statut =1;
        if ($hotel->statut){
            return response()->json([$hotel::all()]);
        }
        else{
            return response()->json([
                'message' => "pas d'hotels disponible"
            ]);
        }

//        return response()->json($hotel);
    }


    public function create(Request $request)
    {
        $ImageValidate =$request->validate([
        'name'=> 'required|string',
        'image' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'type' =>'integer|max:6',
        'description'=> 'required|string',
        'longitude'=> 'required|string',
        'lattitude' => 'required|string',
        'gerant_id' => 'required|exists:users,id',
            'statut' => 'boolean'
        ]);

        // si l'image entree par l'utilisateur ne repecte pas es conditions de la validation, ne pas l'enregistrer dans le storage
        $image = $ImageValidate['image'];
        if ( !$image->getError() ){
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
        $hotel->statut = $ImageValidate['statut'];
        $hotel->save();

        //statut de l'hotel activee ou desactivee

        return response()->json([
            'message' => 'Hotel ajoute avec succes',
        ]);

    }


    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
       // Storage::disk('public')->path();  : renvoie le chemin de l'image..si je veux redimensionner oar exemple l'image
//    use Spatie\Glide\GlideImage;  redimensionnement avec glide
//
//        $url = GlideImage::createUrl('path/to/image.jpg', [
//            'w' => 300, // largeur
//            'h' => 200, // hauteur
//            'fit' => 'crop', // mode de recadrage
//        ]);

    }

    public function update(Request $request, $id)
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
        $image = $request->validate('image');
        if ( !$image->getError() ){
            $imagePath = $request->file('image')->store('images/hotels', 'public');
        }


        $hotel = Hotel::findOrFail($id);
        if ($hotel->image){
            Storage::disk('public')->delete($hotel->image);
        }
        $hotel->update($request->all());
        return response()->json(['message' => 'Hotel mis jour avec succes', 'hotel' => $hotel]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
         $hotel->statut = 0;
//        $hotel->delete();
        return response()->json(['message' => 'Hotel supprimee avec success']);
    }
}
