<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Requests\GuestStoreRequest;
use App\Http\Requests\GuestUpdateRequest;
use App\Http\Resources\GuestCollection;
use App\Http\Resources\GuestResource;
use App\guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\GuestCollection
     */
    public function index(Request $request)
    {
        $guests = Guest::all();

        return new GuestCollection($guests);
    }

    /**
     * @param \App\Http\Requests\GuestStoreRequest $request
     * @return \App\Http\Resources\GuestResource
     */
    public function store(GuestStoreRequest $request)
    {
        $guest = Guest::create($request->validated());

        return new GuestResource($guest);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\guest $guest
     * @return \App\Http\Resources\GuestResource
     */
    public function show(Request $request, Guest $guest)
    {
        return new GuestResource($guest);
    }

    /**
     * @param \App\Http\Requests\GuestUpdateRequest $request
     * @param \App\guest $guest
     * @return \App\Http\Resources\GuestResource
     */
    public function update(GuestUpdateRequest $request, Guest $guest)
    {
        $guest->update($request->validated());

        return new GuestResource($guest);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\guest $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Guest $guest)
    {
        $guest->delete();

        return response()->noContent();
    }
}
