<?php

namespace App\Http\Controllers;

use App\Http\Requests\BenefitStoreRequest;
use App\Http\Requests\BenefitUpdateRequest;
use App\Http\Resources\BenefitCollection;
use App\Http\Resources\BenefitResource;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\BenefitCollection
     */
    public function index(Request $request)
    {
        $benefits = Benefit::all();

        return new BenefitCollection($benefits);
    }

    /**
     * @param \App\Http\Requests\BenefitStoreRequest $request
     * @return \App\Http\Resources\BenefitResource
     */
    public function store(BenefitStoreRequest $request)
    {
        $benefit = Benefit::create($request->validated());

        return new BenefitResource($benefit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Benefit $benefit
     * @return \App\Http\Resources\BenefitResource
     */
    public function show(Request $request, Benefit $benefit)
    {
        return new BenefitResource($benefit);
    }

    /**
     * @param \App\Http\Requests\BenefitUpdateRequest $request
     * @param \App\Models\Benefit $benefit
     * @return \App\Http\Resources\BenefitResource
     */
    public function update(BenefitUpdateRequest $request, Benefit $benefit)
    {
        $benefit->update($request->validated());

        return new BenefitResource($benefit);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Benefit $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Benefit $benefit)
    {
        $benefit->delete();

        return response()->noContent();
    }
}
