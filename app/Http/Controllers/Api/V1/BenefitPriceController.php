<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BenefitPricesFilter;
use App\Models\BenefitPrice;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BenefitPriceResource;
use App\Http\Resources\BenefitPriceCollection;
use App\Http\Requests\BenefitPriceStoreRequest;
use App\Http\Requests\BenefitPriceUpdateRequest;

class BenefitPriceController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(BenefitPrice::class, 'benefitPrice');
    }
    /**
     * Affiche la liste des prix des bénéfits
     *
     * @param Request $request
     * @return BenefitPriceCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\BenefitPriceCollection
     * @apiResourceModel App\Models\BenefitPrice
     */
    public function index(Request $request): BenefitPriceCollection
    {
        $filter = new BenefitPricesFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BenefitPriceCollection(BenefitPrice::paginate());
        } else {
            return new BenefitPriceCollection(BenefitPrice::where($queryItems)->paginate());
        }
    }

    /**
     * Crée un prix des bénéfits
     *
     * @param BenefitPriceStoreRequest $request
     * @return JsonResponse|BenefitPriceResource
     *
     */
    public function store(BenefitPriceStoreRequest $request): JsonResponse|BenefitPriceResource
    {
        /*if (auth()->user()->cannot('create', BenefitPrice::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $benefitPrice = BenefitPrice::create($request->validated());

        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * Affiche le détail d’un prix des bénéfits
     *
     * @param Request $request
     * @param BenefitPrice $benefitPrice
     * @return BenefitPriceResource
     *
     * @apiResource App\Http\Resources\BenefitPriceResource
     * @apiResourceModel App\Models\BenefitPrice
     */
    public function show(Request $request, BenefitPrice $benefitPrice): BenefitPriceResource
    {
        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * Modifie un prix des bénéfits
     *
     * @param BenefitPriceUpdateRequest $request
     * @param BenefitPrice $benefitPrice
     * @return JsonResponse|BenefitPriceResource
     *
     */
    public function update(BenefitPriceUpdateRequest $request, BenefitPrice $benefitPrice): JsonResponse|BenefitPriceResource
    {
        /*if (auth()->user()->cannot('update', $benefitPrice)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $benefitPrice->update($request->validated());

        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * Supprime un prix des bénéfits
     *
     * @param Request $request
     * @param BenefitPrice $benefitPrice
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, BenefitPrice $benefitPrice): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $benefitPrice)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $benefitPrice->delete();

        return response()->noContent();
    }
}
