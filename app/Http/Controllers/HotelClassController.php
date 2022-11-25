<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelClassStoreRequest;
use App\Http\Requests\HotelClassUpdateRequest;
use App\Http\Resources\HotelClassCollection;
use App\Http\Resources\HotelClassResource;
use App\Models\HotelClass;
use Illuminate\Http\Request;

class HotelClassController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\HotelClassCollection
     */
    public function index(Request $request)
    {
        $hotelClasses = HotelClass::all();

        return new HotelClassCollection($hotelClasses);
    }

    /**
     * @param \App\Http\Requests\HotelClassStoreRequest $request
     * @return \App\Http\Resources\HotelClassResource
     */
    public function store(HotelClassStoreRequest $request)
    {
        $hotelClass = HotelClass::create($request->validated());

        return new HotelClassResource($hotelClass);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelClass $hotelClass
     * @return \App\Http\Resources\HotelClassResource
     */
    public function show(Request $request, HotelClass $hotelClass)
    {
        return new HotelClassResource($hotelClass);
    }

    /**
     * @param \App\Http\Requests\HotelClassUpdateRequest $request
     * @param \App\Models\HotelClass $hotelClass
     * @return \App\Http\Resources\HotelClassResource
     */
    public function update(HotelClassUpdateRequest $request, HotelClass $hotelClass)
    {
        $hotelClass->update($request->validated());

        return new HotelClassResource($hotelClass);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HotelClass $hotelClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HotelClass $hotelClass)
    {
        $hotelClass->delete();

        return response()->noContent();
    }
}
