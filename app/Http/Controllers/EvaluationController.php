<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return response()->json($evaluations);
    }


    public function create(Request $request)
    {
        $statut_defaut = true;

        $validatedata = $request->validate([
            'star_quantity'=> 'required|integer',
            'comment'=> 'nullable|string',
            'evaluationable_id' =>'required|integer',
            'evaluationable_type' =>'required|string',
            'user_id'=>'required|integer',

        ]);




        $evaluations = new Evaluation();
        $evaluations->star_quantity = $request->star_quantity;
        $evaluations->comment = $request->comment;
        $evaluations->evaluationable_id = $request->evaluationable_id;
        $evaluations->evaluationable_type =$request->evaluationable_type;
        $evaluations->user_id =$request->user_id;

        $statut= empty($validatedata['statut'])? $statut_defaut:$request->statut;

        $evaluations->statut = $statut;
        $evaluations->save();

        return response()->json([
            'message' => 'evaluation ajoute avec succes',
        ]);

    }

    public function show($id)
    {
        $evaluations = Evaluation::findOrFail($id);
        return response()->json($evaluations);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'star_quantity'=> 'required|integer',
            'comment'=> 'string',
            'statut'=> 'boolean',
            'evaluationable_id' =>'required|integer',
            'evaluationable_type' =>'required|string',
            'user_id'=>'required|integer',
        ]);

        $evaluations = Evaluation::findOrFail($id);
        $evaluations->update($request->all());
        return response()->json(['message' => 'evaluation mis jour avec succes', 'evaluation' => $evaluations]);
    }

    public function destroy($id)
    {
        $evaluations = Evaluation::findOrFail($id);
        $evaluations->delete();
        return response()->json(['message' => 'evaluation supprimee avec success']);
    }
}
