<?php

namespace App\Http\Controllers\Api;

use App\Filters\V1\HotelClassesFilter;
use App\Models\HotelClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\HotelClassResource;
use App\Http\Resources\HotelClassCollection;
use App\Http\Requests\HotelClassStoreRequest;
use App\Http\Requests\HotelClassUpdateRequest;

class HotelClassController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(HotelClass::class, 'hotelClass');
    }
    /**
     * Affiche la liste des classes d'hôtels
     *
     * @param Request $request
     * @return HotelClassCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\HotelClassCollection
     * @apiResourceModel App\Models\HotelClass
     */
    public function index(Request $request): HotelClassCollection
    {
        $filter = new HotelClassesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new HotelClassCollection(HotelClass::paginate());
        } else {
            return new HotelClassCollection(HotelClass::where($queryItems)->paginate());
        }
    }

    /**
     * Crée une classe d'hôtel
     *
     * @param HotelClassStoreRequest $request
     * @return JsonResponse|HotelClassResource
     *
     */
    public function store(HotelClassStoreRequest $request): JsonResponse|HotelClassResource
    {
        /*if (auth()->user()->cannot('create', HotelClass::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $hotelClass = HotelClass::create($request->validated());

        return new HotelClassResource($hotelClass);
    }

    /**
     * Affiche le détail d’une classe d'hôtel
     *
     * @param Request $request
     * @param HotelClass $hotelClass
     * @return HotelClassResource
     *
     * @apiResource App\Http\Resources\HotelClassResource
     * @apiResourceModel App\Models\HotelClass
     */
    public function show(Request $request, HotelClass $hotelClass): HotelClassResource
    {
        return new HotelClassResource($hotelClass);
    }

    /**
     * Modifie une classe d'hôtel
     *
     * @param HotelClassUpdateRequest $request
     * @param HotelClass $hotelClass
     * @return JsonResponse|HotelClassResource
     *
     */
    public function update(HotelClassUpdateRequest $request, HotelClass $hotelClass): JsonResponse|HotelClassResource
    {
        /*if (auth()->user()->cannot('update', $hotelClass)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $hotelClass->update($request->validated());

        return new HotelClassResource($hotelClass);
    }

    /**
     * Supprime une classe d'hôtel
     *
     * @param Request $request
     * @param HotelClass $hotelClass
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, HotelClass $hotelClass): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $hotelClass)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $hotelClass->delete();

        return response()->noContent();
    }
}
