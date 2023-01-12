<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\AddressesFilter;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;
use App\Http\Requests\AddressStoreRequest;
use App\Http\Requests\AddressUpdateRequest;

class AddressController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Address::class, 'address');
    }
    /**
     * Affiche la liste des adresses
     *
     * @param Request $request
     * @return AddressCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\AddressCollection
     * @apiResourceModel App\Models\Address
     */
    public function index(Request $request): AddressCollection
    {
        $filter = new AddressesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new AddressCollection(Address::paginate());
        } else {
            return new AddressCollection(Address::where($queryItems)->paginate());
        }
    }

    /**
     * Crée une adresse
     *
     * @param AddressStoreRequest $request
     * @return JsonResponse|AddressResource
     *
     */
    public function store(AddressStoreRequest $request): JsonResponse|AddressResource
    {
        /*if (auth()->user()->cannot('create', Address::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $address = Address::create($request->validated());

        return new AddressResource($address);
    }

    /**
     * Affiche le détail d’une adresse
     *
     * @param Request $request
     * @param Address $address
     * @return AddressResource
     *
     * @apiResource App\Http\Resources\AddressResource
     * @apiResourceModel App\Models\Address
     */
    public function show(Request $request, Address $address): AddressResource
    {
        return new AddressResource($address);
    }

    /**
     * Modifie une adresse
     *
     * @param AddressUpdateRequest $request
     * @param Address $address
     * @return JsonResponse|AddressResource
     *
     */
    public function update(AddressUpdateRequest $request, Address $address): JsonResponse|AddressResource
    {
        /*if (auth()->user()->cannot('update', $address)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $address->update($request->validated());

        return new AddressResource($address);
    }

    /**
     * Supprime une adresse
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Address $address): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $address)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $address->delete();

        return response()->noContent();
    }
}
