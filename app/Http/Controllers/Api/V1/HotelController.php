<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\HotelsFilter;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\HotelResource;
use App\Http\Resources\HotelCollection;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;

class HotelController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Hotel::class, 'hotel');
    }

    public function search(Request $request)
{
    
    $name = $request->input('name');
    $rate = $request->input('rate');

    $query = Hotel::query();

    if ($name) {
        $query->where(function ($query) use ($name) {
            $query->where('name', 'like', "%$name%");
            $query->orWhere('street', 'like', "%$name%");
            $query->orWhere('postcode', 'like', "%$name%");
        });
    }

    if ($rate) {
        $query->whereHas('hotelClass', function ($query) use ($rate) {
            $query->where('star_rating', 'like', $rate);
        });
    }

    $hotels = $query->with('hotelClass')->get();
    return response()->json($hotels);
}
    /**
     * Affiche la liste des hotêls
     *
     * @param Request $request
     * @return HotelCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\HotelCollection
     * @apiResourceModel App\Models\Hotel
     */
    public function index(Request $request): HotelCollection
    {
        $filter = new HotelsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new HotelCollection(Hotel::paginate());
        } else {
            return new HotelCollection(Hotel::where($queryItems)->paginate());
        }
    }

    /**
     * Crée un hôtel
     *
     * @param HotelStoreRequest $request
     * @return JsonResponse|HotelResource
     *
     */
    public function store(HotelStoreRequest $request): JsonResponse|HotelResource
    {
        /*if (auth()->user()->cannot('create', Hotel::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $hotel = Hotel::create($request->validated());

        return new HotelResource($hotel);
    }

    /**
     * Affiche le détail d’un hôtel
     *
     * @param Request $request
     * @param Hotel $hotel
     * @return HotelResource
     *
     * @apiResource App\Http\Resources\HotelResource
     * @apiResourceModel App\Models\Hotel
     */
    public function show(Request $request, Hotel $hotel): HotelResource
    {
        return new HotelResource($hotel);
    }

    /**
     * Modifie un hôtel
     *
     * @param HotelUpdateRequest $request
     * @param Hotel $hotel
     * @return JsonResponse|HotelResource
     *
     */
    public function update(HotelUpdateRequest $request, Hotel $hotel): JsonResponse|HotelResource
    {
        /*if (auth()->user()->cannot('update', $hotel)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $hotel->update($request->validated());

        return new HotelResource($hotel);
    }

    /**
     * Supprime un hôtel
     *
     * @param Request $request
     * @param Hotel $hotel
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Hotel $hotel): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $hotel)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $hotel->delete();

        return response()->noContent();
    }
}
