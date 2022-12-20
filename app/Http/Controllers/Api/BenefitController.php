<?php

namespace App\Http\Controllers\Api;

use App\Filters\V1\BenefitsFilter;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\BenefitResource;
use App\Http\Resources\BenefitCollection;
use App\Http\Requests\BenefitStoreRequest;
use App\Http\Requests\BenefitUpdateRequest;

class BenefitController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Benefit::class, 'address');
    }
    /**
     * Affiche la liste des bénéfit
     *
     * @param Request $request
     * @return BenefitCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\BenefitCollection
     * @apiResourceModel App\Models\Benefit
     */
    public function index(Request $request): BenefitCollection
    {
        $filter = new BenefitsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new BenefitCollection(Benefit::paginate());
        } else {
            return new BenefitCollection(Benefit::where($queryItems)->paginate());
        }
    }

    /**
     * Crée un benefit
     *
     * @param BenefitStoreRequest $request
     * @return JsonResponse|BenefitResource
     *
     */
    public function store(BenefitStoreRequest $request): JsonResponse|BenefitResource
    {
        /*if (auth()->user()->cannot('create', Benefit::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $benefit = Benefit::create($request->validated());

        return new BenefitResource($benefit);
    }

    /**
     * Affiche le détail d’un benefit
     *
     * @param Request $request
     * @param Benefit $benefit
     * @return BenefitResource
     *
     * @apiResource App\Http\Resources\BenefitResource
     * @apiResourceModel App\Models\Benefit
     */
    public function show(Request $request, Benefit $benefit): BenefitResource
    {
        return new BenefitResource($benefit);
    }

    /**
     * Modifie un benefit
     *
     * @param BenefitUpdateRequest $request
     * @param Benefit $benefit
     * @return JsonResponse|BenefitResource
     *
     */
    public function update(BenefitUpdateRequest $request, Benefit $benefit): JsonResponse|BenefitResource
    {
        /*if (auth()->user()->cannot('update', $benefit)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $benefit->update($request->validated());

        return new BenefitResource($benefit);
    }

    /**
     * Supprime un benefit
     *
     * @param Request $request
     * @param Benefit $benefit
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Benefit $benefit): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $benefit)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $benefit->delete();

        return response()->noContent();
    }
}
