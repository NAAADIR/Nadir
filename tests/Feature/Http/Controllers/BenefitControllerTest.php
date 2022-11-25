<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bedroom;
use App\Models\Benefit;
use App\Models\BenefitPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BenefitController
 */
class BenefitControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $benefits = Benefit::factory()->count(3)->create();

        $response = $this->get(route('benefit.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BenefitController::class,
            'store',
            \App\Http\Requests\BenefitStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $bedroom = Bedroom::factory()->create();
        $benefit_price = BenefitPrice::factory()->create();
        $user = User::factory()->create();

        $response = $this->post(route('benefit.store'), [
            'bedroom_id' => $bedroom->id,
            'benefit_price_id' => $benefit_price->id,
            'user_id' => $user->id,
        ]);

        $benefits = Benefit::query()
            ->where('bedroom_id', $bedroom->id)
            ->where('benefit_price_id', $benefit_price->id)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $benefits);
        $benefit = $benefits->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $benefit = Benefit::factory()->create();

        $response = $this->get(route('benefit.show', $benefit));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BenefitController::class,
            'update',
            \App\Http\Requests\BenefitUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $benefit = Benefit::factory()->create();
        $bedroom = Bedroom::factory()->create();
        $benefit_price = BenefitPrice::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('benefit.update', $benefit), [
            'bedroom_id' => $bedroom->id,
            'benefit_price_id' => $benefit_price->id,
            'user_id' => $user->id,
        ]);

        $benefit->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($bedroom->id, $benefit->bedroom_id);
        $this->assertEquals($benefit_price->id, $benefit->benefit_price_id);
        $this->assertEquals($user->id, $benefit->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $benefit = Benefit::factory()->create();

        $response = $this->delete(route('benefit.destroy', $benefit));

        $response->assertNoContent();

        $this->assertModelMissing($benefit);
    }
}
