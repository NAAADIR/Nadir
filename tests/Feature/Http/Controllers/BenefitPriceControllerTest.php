<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BenefitPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BenefitPriceController
 */
class BenefitPriceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $benefitPrices = BenefitPrice::factory()->count(3)->create();

        $response = $this->get(route('benefit-price.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BenefitPriceController::class,
            'store',
            \App\Http\Requests\BenefitPriceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('benefit-price.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(benefitPrices, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $benefitPrice = BenefitPrice::factory()->create();

        $response = $this->get(route('benefit-price.show', $benefitPrice));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BenefitPriceController::class,
            'update',
            \App\Http\Requests\BenefitPriceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $benefitPrice = BenefitPrice::factory()->create();

        $response = $this->put(route('benefit-price.update', $benefitPrice));

        $benefitPrice->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $benefitPrice = BenefitPrice::factory()->create();

        $response = $this->delete(route('benefit-price.destroy', $benefitPrice));

        $response->assertNoContent();

        $this->assertModelMissing($benefitPrice);
    }
}
