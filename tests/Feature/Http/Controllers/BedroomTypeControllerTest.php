<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BedroomType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BedroomTypeController
 */
class BedroomTypeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $bedroomTypes = BedroomType::factory()->count(3)->create();

        $response = $this->get(route('bedroom-type.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BedroomTypeController::class,
            'store',
            \App\Http\Requests\BedroomTypeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('bedroom-type.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(bedroomTypes, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $bedroomType = BedroomType::factory()->create();

        $response = $this->get(route('bedroom-type.show', $bedroomType));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BedroomTypeController::class,
            'update',
            \App\Http\Requests\BedroomTypeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $bedroomType = BedroomType::factory()->create();

        $response = $this->put(route('bedroom-type.update', $bedroomType));

        $bedroomType->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $bedroomType = BedroomType::factory()->create();

        $response = $this->delete(route('bedroom-type.destroy', $bedroomType));

        $response->assertNoContent();

        $this->assertModelMissing($bedroomType);
    }
}
