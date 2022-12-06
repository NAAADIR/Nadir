<?php

namespace App\Http\Controllers;

use App\Http\Requests\BenefitPriceStoreRequest;
use App\Http\Requests\BenefitPriceUpdateRequest;
use App\Http\Resources\BenefitPriceCollection;
use App\Http\Resources\BenefitPriceResource;
use App\Models\BenefitPrice;
use Illuminate\Http\Request;

class BenefitPriceController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BenefitPriceCollection
     */
    public function index(Request $request)
    {
        $benefitPrices = BenefitPrice::all();

        return new BenefitPriceCollection($benefitPrices);
    }

    /**
     * @param \App\Http\Requests\BenefitPriceStoreRequest $request
     * @return \App\Http\Resources\BenefitPriceResource
     */
    public function store(BenefitPriceStoreRequest $request)
    {
        $benefitPrice = BenefitPrice::create($request->validated());

        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BenefitPrice $benefitPrice
     * @return \App\Http\Resources\BenefitPriceResource
     */
    public function show(Request $request, BenefitPrice $benefitPrice)
    {
        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * @param \App\Http\Requests\BenefitPriceUpdateRequest $request
     * @param \App\Models\BenefitPrice $benefitPrice
     * @return \App\Http\Resources\BenefitPriceResource
     */
    public function update(BenefitPriceUpdateRequest $request, BenefitPrice $benefitPrice)
    {
        $benefitPrice->update($request->validated());

        return new BenefitPriceResource($benefitPrice);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BenefitPrice $benefitPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BenefitPrice $benefitPrice)
    {
        $benefitPrice->delete();

        return response()->noContent();
    }
}
