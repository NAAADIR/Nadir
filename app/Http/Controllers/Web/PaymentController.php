<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStoreRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PaymentCollection
     */
    public function index(Request $request)
    {
        $payments = Payment::all();

        return new PaymentCollection($payments);
    }

    /**
     * @param \App\Http\Requests\PaymentStoreRequest $request
     * @return \App\Http\Resources\PaymentResource
     */
    public function store(PaymentStoreRequest $request)
    {
        $payment = Payment::create($request->validated());

        return new PaymentResource($payment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \App\Http\Resources\PaymentResource
     */
    public function show(Request $request, Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * @param \App\Http\Requests\PaymentUpdateRequest $request
     * @param \App\Models\Payment $payment
     * @return \App\Http\Resources\PaymentResource
     */
    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $payment->update($request->validated());

        return new PaymentResource($payment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Payment $payment)
    {
        $payment->delete();

        return response()->noContent();
    }
}
