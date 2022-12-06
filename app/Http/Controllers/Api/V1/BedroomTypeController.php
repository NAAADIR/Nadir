<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BedroomType;
use Illuminate\Http\Request;

class BedroomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BedroomType::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (BedroomType::create($request->all())) {
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
        $bedroomType = BedroomType::findOrFail($id);
        return $bedroomType;
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
        $bedroomType = BedroomType::find($request->id);
        if ($bedroomType->update($request->all())) {
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
        $bedroomType = BedroomType::findOrFail($id);
        if ($bedroomType->delete($id)) {
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
