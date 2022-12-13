<?php

namespace App\Http\Controllers\Api;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\PaymentTypeResource;
use App\Http\Resources\PaymentTypeCollection;
use App\Http\Requests\PaymentTypeStoreRequest;
use App\Http\Requests\PaymentTypeUpdateRequest;

class PaymentTypeController extends Controller
{
    /**
     * Affiche la liste des types de paiements
     *
     * @param Request $request
     * @return PaymentTypeCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\PaymentTypeCollection
     * @apiResourceModel App\Models\PaymentType
     */
    public function index(Request $request): PaymentTypeCollection
    {
        $paymentTypes = QueryBuilder::for(PaymentType::class)
            ->allowedFilters(['name']);

        

        return new PaymentTypeCollection($paymentTypes);
    }

    /**
     * Crée un type de paiement
     *
     * @param PaymentTypeStoreRequest $request
     * @return JsonResponse|PaymentTypeResource
     *
     */
    public function store(PaymentTypeStoreRequest $request): JsonResponse|PaymentTypeResource
    {
        /*if (auth()->user()->cannot('create', PaymentType::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $paymentType = PaymentType::create($request->validated());

        return new PaymentTypeResource($paymentType);
    }

    /**
     * Affiche le détail d’un type de paiement
     *
     * @param Request $request
     * @param PaymentType $paymentType
     * @return PaymentTypeResource
     *
     * @apiResource App\Http\Resources\PaymentTypeResource
     * @apiResourceModel App\Models\PaymentType
     */
    public function show(Request $request, PaymentType $paymentType): PaymentTypeResource
    {
        return new PaymentTypeResource($paymentType);
    }

    /**
     * Modifie un type de paiement
     *
     * @param PaymentTypeUpdateRequest $request
     * @param PaymentType $paymentType
     * @return JsonResponse|PaymentTypeResource
     *
     */
    public function update(PaymentTypeUpdateRequest $request, PaymentType $paymentType): JsonResponse|PaymentTypeResource
    {
        /*if (auth()->user()->cannot('update', $paymentType)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $paymentType->update($request->validated());

        return new PaymentTypeResource($paymentType);
    }

    /**
     * Supprime un type de paiement
     *
     * @param Request $request
     * @param PaymentType $paymentType
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, PaymentType $paymentType): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $paymentType)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $paymentType->delete();

        return response()->noContent();
    }
}
