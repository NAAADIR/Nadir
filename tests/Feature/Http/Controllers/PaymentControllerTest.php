<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentType;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PaymentController
 */
class PaymentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $payments = Payment::factory()->count(3)->create();

        $response = $this->get(route('payment.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'store',
            \App\Http\Requests\PaymentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $creditCardName = $this->faker->word;
        $creditCardNumber = $this->faker->word;
        $creditCardExpirationDate = $this->faker->date();
        $cvv = $this->faker->numberBetween(-10000, 10000);
        $start_at = $this->faker->dateTime();
        $end_at = $this->faker->dateTime();
        $payment_type = PaymentType::factory()->create();

        $response = $this->post(route('payment.store'), [
            'creditCardName' => $creditCardName,
            'creditCardNumber' => $creditCardNumber,
            'creditCardExpirationDate' => $creditCardExpirationDate,
            'cvv' => $cvv,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'payment_type_id' => $payment_type->id,
        ]);

        $payments = Payment::query()
            ->where('creditCardName', $creditCardName)
            ->where('creditCardNumber', $creditCardNumber)
            ->where('creditCardExpirationDate', $creditCardExpirationDate)
            ->where('cvv', $cvv)
            ->where('start_at', $start_at)
            ->where('end_at', $end_at)
            ->where('payment_type_id', $payment_type->id)
            ->get();
        $this->assertCount(1, $payments);
        $payment = $payments->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $payment = Payment::factory()->create();

        $response = $this->get(route('payment.show', $payment));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PaymentController::class,
            'update',
            \App\Http\Requests\PaymentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $payment = Payment::factory()->create();
        $creditCardName = $this->faker->word;
        $creditCardNumber = $this->faker->word;
        $creditCardExpirationDate = $this->faker->date();
        $cvv = $this->faker->numberBetween(-10000, 10000);
        $start_at = $this->faker->dateTime();
        $end_at = $this->faker->dateTime();
        $payment_type = PaymentType::factory()->create();

        $response = $this->put(route('payment.update', $payment), [
            'creditCardName' => $creditCardName,
            'creditCardNumber' => $creditCardNumber,
            'creditCardExpirationDate' => $creditCardExpirationDate,
            'cvv' => $cvv,
            'start_at' => $start_at,
            'end_at' => $end_at,
            'payment_type_id' => $payment_type->id,
        ]);

        $payment->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($creditCardName, $payment->creditCardName);
        $this->assertEquals($creditCardNumber, $payment->creditCardNumber);
        $this->assertEquals(Carbon::parse($creditCardExpirationDate), $payment->creditCardExpirationDate);
        $this->assertEquals($cvv, $payment->cvv);
        $this->assertEquals($start_at, $payment->start_at);
        $this->assertEquals($end_at, $payment->end_at);
        $this->assertEquals($payment_type->id, $payment->payment_type_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $payment = Payment::factory()->create();

        $response = $this->delete(route('payment.destroy', $payment));

        $response->assertNoContent();

        $this->assertModelMissing($payment);
    }
}
