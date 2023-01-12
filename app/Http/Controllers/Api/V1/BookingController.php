<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BookingsFilter;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BookingResource;
use App\Http\Resources\BookingCollection;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Booking::class, 'booking');
    }
    /**
     * Affiche la liste des reservations
     *
     * @param Request $request
     * @return BookingCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\BookingCollection
     * @apiResourceModel App\Models\Booking
     */
    public function index(Request $request): BookingCollection
    {
        $filter = new BookingsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BookingCollection(Booking::paginate());
        } else {
            return new BookingCollection(Booking::where($queryItems)->paginate());
        }
    }

    /**
     * Crée une reservation
     *
     * @param BookingStoreRequest $request
     * @return JsonResponse|BookingResource
     *
     */
    public function store(BookingStoreRequest $request): JsonResponse|BookingResource
    {
        /*if (auth()->user()->cannot('create', Booking::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $booking = Booking::create($request->validated());

        return new BookingResource($booking);
    }

    /**
     * Affiche le détail d’une reservation
     *
     * @param Request $request
     * @param Booking $booking
     * @return BookingResource
     *
     * @apiResource App\Http\Resources\BookingResource
     * @apiResourceModel App\Models\Booking
     */
    public function show(Request $request, Booking $booking): BookingResource
    {
        return new BookingResource($booking);
    }

    /**
     * Modifie une reservation
     *
     * @param BookingUpdateRequest $request
     * @param Booking $booking
     * @return JsonResponse|BookingResource
     *
     */
    public function update(BookingUpdateRequest $request, Booking $booking): JsonResponse|BookingResource
    {
        /*if (auth()->user()->cannot('update', $booking)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $booking->update($request->validated());

        return new BookingResource($booking);
    }

    /**
     * Supprime une reservation
     *
     * @param Request $request
     * @param Booking $booking
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Booking $booking): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $booking)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $booking->delete();

        return response()->noContent();
    }
}
