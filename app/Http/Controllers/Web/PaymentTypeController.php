<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentTypeStoreRequest;
use App\Http\Requests\PaymentTypeUpdateRequest;
use App\Http\Resources\PaymentTypeCollection;
use App\Http\Resources\PaymentTypeResource;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PaymentTypeCollection
     */
    public function index(Request $request)
    {
        $paymentTypes = PaymentType::all();

        return new PaymentTypeCollection($paymentTypes);
    }

    /**
     * @param \App\Http\Requests\PaymentTypeStoreRequest $request
     * @return \App\Http\Resources\PaymentTypeResource
     */
    public function store(PaymentTypeStoreRequest $request)
    {
        $paymentType = PaymentType::create($request->validated());

        return new PaymentTypeResource($paymentType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $paymentType
     * @return \App\Http\Resources\PaymentTypeResource
     */
    public function show(Request $request, PaymentType $paymentType)
    {
        return new PaymentTypeResource($paymentType);
    }

    /**
     * @param \App\Http\Requests\PaymentTypeUpdateRequest $request
     * @param \App\Models\PaymentType $paymentType
     * @return \App\Http\Resources\PaymentTypeResource
     */
    public function update(PaymentTypeUpdateRequest $request, PaymentType $paymentType)
    {
        $paymentType->update($request->validated());

        return new PaymentTypeResource($paymentType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PaymentType $paymentType)
    {
        $paymentType->delete();

        return response()->noContent();
    }
}
