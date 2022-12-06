<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\BenefitPrice;
use Illuminate\Http\Request;

class BenefitPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BenefitPrice::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (BenefitPrice::create($request->all())) {
            return response()->json([
                'success' => 'Créé avec succès'
            ], 200);
        }
        else{
            return response()->json([
                'error'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $benefit = Benefit::findOrFail($id);
        return $benefit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $benefitPrice = BenefitPrice::find($request->id);
        if ($benefitPrice->update($request->all())) {
            return response()->json([
                'success' => 'Modifié avec succès'
            ], 200);
        }
        else{
            return response()->json([
                'error'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $benefitPrice = BenefitPrice::findOrFail($id);
        if ($benefitPrice->delete($id)) {
            return response()->json([
                'success' => 'Supprimé avec succès'
            ], 200);
        }
        else{
            return response()->json([
                'error'
            ], 200);
        }
    }
}
