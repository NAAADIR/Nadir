<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BedroomsFilter;
use App\Models\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BedroomResource;
use App\Http\Resources\BedroomCollection;
use App\Http\Requests\BedroomStoreRequest;
use App\Http\Requests\BedroomUpdateRequest;

class BedroomController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Bedroom::class, 'bedroom');
    }

    public function search(Request $request) {
        $name = $request->input('name');
        $nameHotel = $request->input('nameHotel');
        $type = $request->input('type');

        $query = Bedroom::query();

        if ($name) {
            $query->where(function ($query) use ($name) {
                $query->where('name', 'like', "%$name%");
                $query->orWhere('price', 'like', "%$name%");
            });
        }

        if ($nameHotel) {
            $query->whereHas('hotel', function ($query) use ($nameHotel) {
                $query->where('hotels.name', 'like', "%$nameHotel%");
            });
        }

        if ($type) {
            $query->join('bedroom_types', 'bedrooms.bedroom_type_id', '=', 'bedroom_types.id')
                ->where('bedroom_types.name', 'like', "%$type%");
        }

        $query->with(['bedroomType', 'hotel' => 
        function($query){
            $query->with('hotelClass');
        }])->paginate();
        $bedrooms = $query->get();
        return new BedroomCollection($bedrooms);

    }
    /**
     * Affiche la liste des chambres
     *
     * @param Request $request
     * @return BedroomCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\BedroomCollection
     * @apiResourceModel App\Models\Bedroom
     */
    public function index(Request $request): BedroomCollection
    {
        $filter = new BedroomsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BedroomCollection(Bedroom::paginate());
        } else {
            return new BedroomCollection(Bedroom::where($queryItems)->with('bedroomType', 'hotel')->paginate());
            //return Bedroom::where($queryItems)->with('bedroomType')->paginate();
        }
    }

    /**
     * Crée une chambre
     *
     * @param BedroomStoreRequest $request
     * @return JsonResponse|BedroomResource
     *
     */
    public function store(BedroomStoreRequest $request): JsonResponse|BedroomResource
    {
        /*if (auth()->user()->cannot('create', Bedroom::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $bedroom = Bedroom::create($request->validated());
        return new BedroomResource($bedroom);
    }

    /**
     * Affiche le détail d’une chambre
     *
     * @param Request $request
     * @param Bedroom $bedroom
     * @return BedroomResource
     *
     * @apiResource App\Http\Resources\BedroomResource
     * @apiResourceModel App\Models\Bedroom
     */
    public function show(Request $request, Bedroom $bedroom): BedroomResource
    {
        return new BedroomResource($bedroom);
    }

    /**
     * Modifie une chambre
     *
     * @param BedroomUpdateRequest $request
     * @param Bedroom $bedroom
     * @return JsonResponse|BedroomResource
     *
     */
    public function update(BedroomUpdateRequest $request, Bedroom $bedroom): JsonResponse|BedroomResource
    {
        /*if (auth()->user()->cannot('update', $bedroom)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $bedroom->update($request->validated());
        return new BedroomResource($bedroom);
    }

    /**
     * Supprime une chambre
     *
     * @param Request $request
     * @param Bedroom $bedroom
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Bedroom $bedroom): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $bedroom)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $bedroom->delete();
        return response()->noContent();
    }
}
