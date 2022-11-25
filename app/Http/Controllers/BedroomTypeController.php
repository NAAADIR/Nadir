<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedroomTypeStoreRequest;
use App\Http\Requests\BedroomTypeUpdateRequest;
use App\Http\Resources\BedroomTypeCollection;
use App\Http\Resources\BedroomTypeResource;
use App\Models\BedroomType;
use Illuminate\Http\Request;

class BedroomTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BedroomTypeCollection
     */
    public function index(Request $request)
    {
        $bedroomTypes = BedroomType::all();

        return new BedroomTypeCollection($bedroomTypes);
    }

    /**
     * @param \App\Http\Requests\BedroomTypeStoreRequest $request
     * @return \App\Http\Resources\BedroomTypeResource
     */
    public function store(BedroomTypeStoreRequest $request)
    {
        $bedroomType = BedroomType::create($request->validated());

        return new BedroomTypeResource($bedroomType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BedroomType $bedroomType
     * @return \App\Http\Resources\BedroomTypeResource
     */
    public function show(Request $request, BedroomType $bedroomType)
    {
        return new BedroomTypeResource($bedroomType);
    }

    /**
     * @param \App\Http\Requests\BedroomTypeUpdateRequest $request
     * @param \App\Models\BedroomType $bedroomType
     * @return \App\Http\Resources\BedroomTypeResource
     */
    public function update(BedroomTypeUpdateRequest $request, BedroomType $bedroomType)
    {
        $bedroomType->update($request->validated());

        return new BedroomTypeResource($bedroomType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BedroomType $bedroomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BedroomType $bedroomType)
    {
        $bedroomType->delete();

        return response()->noContent();
    }
}
