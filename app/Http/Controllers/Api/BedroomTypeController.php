<?php

namespace App\Http\Controllers\Api;

use App\Filters\V1\BedroomTypesFilter;
use App\Models\BedroomType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BedroomTypeResource;
use App\Http\Resources\BedroomTypeCollection;
use App\Http\Requests\BedroomTypeStoreRequest;
use App\Http\Requests\BedroomTypeUpdateRequest;

class BedroomTypeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(BedroomType::class, 'address');
    }
    /**
     * Affiche la liste des types de chambres
     *
     * @param Request $request
     * @return BedroomTypeCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\BedroomTypeCollection
     * @apiResourceModel App\Models\BedroomType
     */
    public function index(Request $request): BedroomTypeCollection
    {
        $filter = new BedroomTypesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BedroomTypeCollection(BedroomType::paginate());
        } else {
            return new BedroomTypeCollection(BedroomType::where($queryItems)->paginate());
        }
    }

    /**
     * Crée un type de chambre
     *
     * @param BedroomTypeStoreRequest $request
     * @return JsonResponse|BedroomTypeResource
     *
     */
    public function store(BedroomTypeStoreRequest $request): JsonResponse|BedroomTypeResource
    {
        /*if (auth()->user()->cannot('create', BedroomType::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $bedroomType = BedroomType::create($request->validated());

        return new BedroomTypeResource($bedroomType);
    }

    /**
     * Affiche le détail d’un type de chambre
     *
     * @param Request $request
     * @param BedroomType $bedroomType
     * @return BedroomTypeResource
     *
     * @apiResource App\Http\Resources\BedroomTypeResource
     * @apiResourceModel App\Models\BedroomType
     */
    public function show(Request $request, BedroomType $bedroomType): BedroomTypeResource
    {
        return new BedroomTypeResource($bedroomType);
    }

    /**
     * Modifie un type de chambre
     *
     * @param BedroomTypeUpdateRequest $request
     * @param BedroomType $bedroomType
     * @return JsonResponse|BedroomTypeResource
     *
     */
    public function update(BedroomTypeUpdateRequest $request, BedroomType $bedroomType): JsonResponse|BedroomTypeResource
    {
        /*if (auth()->user()->cannot('update', $bedroomType)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $bedroomType->update($request->validated());

        return new BedroomTypeResource($bedroomType);
    }

    /**
     * Supprime un type de chambre
     *
     * @param Request $request
     * @param BedroomType $bedroomType
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, BedroomType $bedroomType): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $bedroomType)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $bedroomType->delete();

        return response()->noContent();
    }
}
