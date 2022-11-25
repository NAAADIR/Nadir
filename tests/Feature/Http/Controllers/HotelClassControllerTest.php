<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HotelClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HotelClassController
 */
class HotelClassControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $hotelClasses = HotelClass::factory()->count(3)->create();

        $response = $this->get(route('hotel-class.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelClassController::class,
            'store',
            \App\Http\Requests\HotelClassStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('hotel-class.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(hotelClasses, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $hotelClass = HotelClass::factory()->create();

        $response = $this->get(route('hotel-class.show', $hotelClass));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HotelClassController::class,
            'update',
            \App\Http\Requests\HotelClassUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $hotelClass = HotelClass::factory()->create();

        $response = $this->put(route('hotel-class.update', $hotelClass));

        $hotelClass->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $hotelClass = HotelClass::factory()->create();

        $response = $this->delete(route('hotel-class.destroy', $hotelClass));

        $response->assertNoContent();

        $this->assertModelMissing($hotelClass);
    }
}
