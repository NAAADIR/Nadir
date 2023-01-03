<?php

namespace App\Http\Controllers\Api;

use App\Filters\V1\CountriesFilter;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CountryCollection;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;

class CountryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Country::class, 'country');
    }
    /**
     * Affiche la liste des pays
     *
     * @param Request $request
     * @return CountryCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\CountryCollection
     * @apiResourceModel App\Models\Country
     */
    public function index(Request $request): CountryCollection
    {
        $filter = new CountriesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new CountryCollection(Country::paginate());
        } else {
            return new CountryCollection(Country::where($queryItems)->paginate());
        }
    }

    /**
     * Crée un pays
     *
     * @param CountryStoreRequest $request
     * @return JsonResponse|CountryResource
     *
     */
    public function store(CountryStoreRequest $request): JsonResponse|CountryResource
    {
        /*if (auth()->user()->cannot('create', Country::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $country = Country::create($request->validated());

        return new CountryResource($country);
    }

    /**
     * Affiche le détail d’un pays
     *
     * @param Request $request
     * @param Country $country
     * @return CountryResource
     *
     * @apiResource App\Http\Resources\CountryResource
     * @apiResourceModel App\Models\Country
     */
    public function show(Request $request, Country $country): CountryResource
    {
        return new CountryResource($country);
    }

    /**
     * Modifie un pays
     *
     * @param CountryUpdateRequest $request
     * @param Country $country
     * @return JsonResponse|CountryResource
     *
     */
    public function update(CountryUpdateRequest $request, Country $country): JsonResponse|CountryResource
    {
        /*if (auth()->user()->cannot('update', $country)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $country->update($request->validated());

        return new CountryResource($country);
    }

    /**
     * Supprime un pays
     *
     * @param Request $request
     * @param Country $country
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Country $country): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $country)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $country->delete();

        return response()->noContent();
    }
}
