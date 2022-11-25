<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BedroomController
 */
class BedroomControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $bedrooms = Bedroom::factory()->count(3)->create();

        $response = $this->get(route('bedroom.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BedroomController::class,
            'store',
            \App\Http\Requests\BedroomStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $bedroom_type = BedroomType::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->post(route('bedroom.store'), [
            'bedroom_type_id' => $bedroom_type->id,
            'hotel_id' => $hotel->id,
        ]);

        $bedrooms = Bedroom::query()
            ->where('bedroom_type_id', $bedroom_type->id)
            ->where('hotel_id', $hotel->id)
            ->get();
        $this->assertCount(1, $bedrooms);
        $bedroom = $bedrooms->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $bedroom = Bedroom::factory()->create();

        $response = $this->get(route('bedroom.show', $bedroom));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BedroomController::class,
            'update',
            \App\Http\Requests\BedroomUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $bedroom = Bedroom::factory()->create();
        $bedroom_type = BedroomType::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->put(route('bedroom.update', $bedroom), [
            'bedroom_type_id' => $bedroom_type->id,
            'hotel_id' => $hotel->id,
        ]);

        $bedroom->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($bedroom_type->id, $bedroom->bedroom_type_id);
        $this->assertEquals($hotel->id, $bedroom->hotel_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $bedroom = Bedroom::factory()->create();

        $response = $this->delete(route('bedroom.destroy', $bedroom));

        $response->assertNoContent();

        $this->assertModelMissing($bedroom);
    }
}
