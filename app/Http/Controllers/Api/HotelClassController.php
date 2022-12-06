<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HotelClass;
use Illuminate\Http\Request;

class HotelClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HotelClass::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (HotelClass::create($request->all())) {
            return response()->json([
                'success' => 'Créée avec succès'
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
        $hotelClass = HotelClass::findOrFail($id);
        return $hotelClass;
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
        $hotelClass = HotelClass::find($request->id);
        if ($hotelClass->update($request->all())) {
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
        $hotelClass = HotelClass::findOrFail($id);
        if ($hotelClass->delete($id)) {
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
