<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vioture;

class VoitureController extends Controller
{
    public function estimationprice(Request $request)
    {
        $car = $request->validate([
            'marque' => 'required',
            'model' => 'required',
            'annee' => 'required',
        ]);

        $similarCars = Vioture::where('marque', $car['marque'])
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