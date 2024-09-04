<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function index()
    {
        $piece = Piece::all();
        return response()->json($piece);
    }


    public function create(Request $request)
    {
        $request->validate([
            'type'=> 'required|string',
            'description'=> 'required|string',
            'price'=> 'required|integer'
//            'hotel_id' => 'required|exists:hotel,id'
        ]);


        $piece = new Piece();
        $piece->type = $request->type;
        $piece->description = $request->description;
        $piece->price = $request->price;
        $piece->hotel_id = $request->hotel_id;
        $piece->save();

        return response()->json([
            'message' => 'piece ajoute avec succes',
        ]);

    }

    public function show($id)
    {
        $piece = Piece::findOrFail($id);
        return response()->json($piece);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'price'=> 'required|intetger',
            'description'=> 'required|string',
            'type'=> 'required|string'
        ]);

        $piece = Piece::findOrFail($id);
        $piece->update($request->all());
        return response()->json(['message' => 'piece mis jour avec succes', 'hotel' => $piece]);
    }

    public function destroy($id)
    {
        $piece = Piece::findOrFail($id);
        $piece->delete();
        return response()->json(['message' => 'piece supprimee avec success']);
    }

}
