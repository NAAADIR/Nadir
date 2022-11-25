<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HotelController
 */
class HotelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $hotels = Hotel::factory()->count(3)->create();

        $response = $this->get(route('hotel.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelController::class,
            'store',
            \App\Http\Requests\HotelStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $hotel_class = HotelClass::factory()->create();

        $response = $this->post(route('hotel.store'), [
            'hotel_class_id' => $hotel_class->id,
        ]);

        $hotels = Hotel::query()
            ->where('hotel_class_id', $hotel_class->id)
            ->get();
        $this->assertCount(1, $hotels);
        $hotel = $hotels->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->get(route('hotel.show', $hotel));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelController::class,
            'update',
            \App\Http\Requests\HotelUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $hotel = Hotel::factory()->create();
        $hotel_class = HotelClass::factory()->create();

        $response = $this->put(route('hotel.update', $hotel), [
            'hotel_class_id' => $hotel_class->id,
        ]);

        $hotel->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($hotel_class->id, $hotel->hotel_class_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $hotel = Hotel::factory()->create();

        $response = $this->delete(route('hotel.destroy', $hotel));

        $response->assertNoContent();

        $this->assertModelMissing($hotel);
    }
}
