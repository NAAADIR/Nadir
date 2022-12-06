<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Http\Resources\BookingCollection;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BookingCollection
     */
    public function index(Request $request)
    {
        $bookings = Booking::all();

        return new BookingCollection($bookings);
    }

    /**
     * @param \App\Http\Requests\BookingStoreRequest $request
     * @return \App\Http\Resources\BookingResource
     */
    public function store(BookingStoreRequest $request)
    {
        $booking = Booking::create($request->validated());

        return new BookingResource($booking);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \App\Http\Resources\BookingResource
     */
    public function show(Request $request, Booking $booking)
    {
        return new BookingResource($booking);
    }

    /**
     * @param \App\Http\Requests\BookingUpdateRequest $request
     * @param \App\Models\Booking $booking
     * @return \App\Http\Resources\BookingResource
     */
    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Booking $booking)
    {
        $booking->delete();

        return response()->noContent();
    }
}
