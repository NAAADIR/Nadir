<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BookingController
 */
class BookingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $bookings = Booking::factory()->count(3)->create();

        $response = $this->get(route('booking.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BookingController::class,
            'store',
            \App\Http\Requests\BookingStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user = User::factory()->create();
        $payment = Payment::factory()->create();

        $response = $this->post(route('booking.store'), [
            'user_id' => $user->id,
            'payment_id' => $payment->id,
        ]);

        $bookings = Booking::query()
            ->where('user_id', $user->id)
            ->where('payment_id', $payment->id)
            ->get();
        $this->assertCount(1, $bookings);
        $booking = $bookings->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('booking.show', $booking));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BookingController::class,
            'update',
            \App\Http\Requests\BookingUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $booking = Booking::factory()->create();
        $user = User::factory()->create();
        $payment = Payment::factory()->create();

        $response = $this->put(route('booking.update', $booking), [
            'user_id' => $user->id,
            'payment_id' => $payment->id,
        ]);

        $booking->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($user->id, $booking->user_id);
        $this->assertEquals($payment->id, $booking->payment_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $booking = Booking::factory()->create();

        $response = $this->delete(route('booking.destroy', $booking));

        $response->assertNoContent();

        $this->assertModelMissing($booking);
    }
}
