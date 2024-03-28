<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voiture;

class VoitureController extends Controller
{

    public function index()
    {
        $voitures = voiture::all();
        return response()->json($voitures);
    }
    public function estimationprice(Request $request)
    {

        $car = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
        ]);

        $similarCars = voiture::where('marque', $car['marque'])
            ->where('modele', $car['modele'])
            ->where('annee', $car['annee'])
            ->get();

            if ($similarCars->isEmpty())
            {
                return response()->json(['message' => 'No similar_cars found'], 404);
            }

            $totalPrice = $similarCars->sum('prix');
        $estimatedPrice = $totalPrice / $similarCars->count();

        return response()->json(['estimatedPrice' => $estimatedPrice]);
    }

}