<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\PaymentsFilter;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\PaymentCollection;
use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Payment::class, 'payment');
    }
    /**
     * Affiche la liste des types de paiements
     *
     * @param Request $request
     * @return PaymentCollection
     * @throws \JsonException
     *
     * @apiResourceCollection App\Http\Resources\PaymentCollection
     * @apiResourceModel App\Models\Payment
     */
    public function index(Request $request): PaymentCollection
    {
        $filter = new PaymentsFilter();
        $queryItems = $filter->transform($request);
        $includePaymentTypes = $request->query('includePaymentTypes');
        $payments = Payment::where($queryItems);

        if ($includePaymentTypes) {
            $payments = $payments->with('PaymentType');
        }
        return new PaymentCollection($payments->paginate()->appends($request->query()));
        // if (count($queryItems) == 0) {
        //     return new PaymentCollection(Payment::paginate());
        // } else {
        //     return new PaymentCollection(Payment::where($queryItems)->paginate());
        // }
    }

    /**
     * Crée un type de paiement
     *
     * @param PaymentStoreRequest $request
     * @return JsonResponse|PaymentResource
     *
     */
    public function store(PaymentStoreRequest $request): JsonResponse|PaymentResource
    {
        /*if (auth()->user()->cannot('create', Payment::class)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour créer cette ressource')], 403);
        }*/

        $payment = Payment::create($request->validated());

        return new PaymentResource($payment);
    }

    /**
     * Affiche le détail d’un type de paiement
     *
     * @param Request $request
     * @param Payment $payment
     * @return PaymentResource
     *
     * @apiResource App\Http\Resources\PaymentResource
     * @apiResourceModel App\Models\Payment
     */
    public function show(Request $request, Payment $payment): PaymentResource
    {
        return new PaymentResource($payment);
    }

    /**
     * Modifie un type de paiement
     *
     * @param PaymentUpdateRequest $request
     * @param Payment $payment
     * @return JsonResponse|PaymentResource
     *
     */
    public function update(PaymentUpdateRequest $request, Payment $payment): JsonResponse|PaymentResource
    {
        /*if (auth()->user()->cannot('update', $payment)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour mettre à jour cette ressource')], 403);
        }*/

        $payment->update($request->validated());

        return new PaymentResource($payment);
    }

    /**
     * Supprime un type de paiement
     *
     * @param Request $request
     * @param Payment $payment
     * @return JsonResponse|Response
     *
     */
    public function destroy(Request $request, Payment $payment): Response|JsonResponse
    {
        /*if (auth()->user()->cannot('delete', $payment)) {
            return response()->json(['message' => __('Vous n’avez pas les autorisations pour supprimer cette ressource')], 403);
        }*/

        $payment->delete();

        return response()->noContent();
    }
}
