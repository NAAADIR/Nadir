<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\HotelCollection
     */
    public function index(Request $request)
    {
        $hotels = Hotel::all();

        return new HotelCollection($hotels);
    }

    /**
     * @param \App\Http\Requests\HotelStoreRequest $request
     * @return \App\Http\Resources\HotelResource
     */
    public function store(HotelStoreRequest $request)
    {
        $hotel = Hotel::create($request->validated());

        return new HotelResource($hotel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \App\Http\Resources\HotelResource
     */
    public function show(Request $request, Hotel $hotel)
    {
        return new HotelResource($hotel);
    }

    /**
     * @param \App\Http\Requests\HotelUpdateRequest $request
     * @param \App\Models\Hotel $hotel
     * @return \App\Http\Resources\HotelResource
     */
    public function update(HotelUpdateRequest $request, Hotel $hotel)
    {
        $hotel->update($request->validated());

        return new HotelResource($hotel);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Hotel $hotel)
    {
        $hotel->delete();

        return response()->noContent();
    }
}
