<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedroomStoreRequest;
use App\Http\Requests\BedroomUpdateRequest;
use App\Http\Resources\BedroomCollection;
use App\Http\Resources\BedroomResource;
use App\Models\Bedroom;
use Illuminate\Http\Request;

class BedroomController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BedroomCollection
     */
    public function index(Request $request)
    {
        $bedrooms = Bedroom::all();

        return new BedroomCollection($bedrooms);
    }

    /**
     * @param \App\Http\Requests\BedroomStoreRequest $request
     * @return \App\Http\Resources\BedroomResource
     */
    public function store(BedroomStoreRequest $request)
    {
        $bedroom = Bedroom::create($request->validated());

        return new BedroomResource($bedroom);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bedroom $bedroom
     * @return \App\Http\Resources\BedroomResource
     */
    public function show(Request $request, Bedroom $bedroom)
    {
        return new BedroomResource($bedroom);
    }

    /**
     * @param \App\Http\Requests\BedroomUpdateRequest $request
     * @param \App\Models\Bedroom $bedroom
     * @return \App\Http\Resources\BedroomResource
     */
    public function update(BedroomUpdateRequest $request, Bedroom $bedroom)
    {
        $bedroom->update($request->validated());

        return new BedroomResource($bedroom);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bedroom $bedroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bedroom $bedroom)
    {
        $bedroom->delete();

        return response()->noContent();
    }
}
