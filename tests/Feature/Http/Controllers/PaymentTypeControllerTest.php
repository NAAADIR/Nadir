<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymentTypeController
 */
class PaymentTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $paymentTypes = PaymentType::factory()->count(3)->create();

        $response = $this->get(route('payment-type.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentTypeController::class,
            'store',
            \App\Http\Requests\PaymentTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->post(route('payment-type.store'), [
            'name' => $name,
            'code' => $code,
        ]);

        $paymentTypes = PaymentType::query()
            ->where('name', $name)
            ->where('code', $code)
            ->get();
        $this->assertCount(1, $paymentTypes);
        $paymentType = $paymentTypes->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $paymentType = PaymentType::factory()->create();

        $response = $this->get(route('payment-type.show', $paymentType));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentTypeController::class,
            'update',
            \App\Http\Requests\PaymentTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $paymentType = PaymentType::factory()->create();
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->put(route('payment-type.update', $paymentType), [
            'name' => $name,
            'code' => $code,
        ]);

        $paymentType->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $paymentType->name);
        $this->assertEquals($code, $paymentType->code);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $paymentType = PaymentType::factory()->create();

        $response = $this->delete(route('payment-type.destroy', $paymentType));

        $response->assertNoContent();

        $this->assertModelMissing($paymentType);
    }
}
