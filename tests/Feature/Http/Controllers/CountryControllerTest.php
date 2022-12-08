<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CountryController
 */
class CountryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $countries = Country::factory()->count(3)->create();

        $response = $this->get(route('country.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CountryController::class,
            'store',
            \App\Http\Requests\CountryStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->post(route('country.store'), [
            'name' => $name,
            'code' => $code,
        ]);

        $countries = Country::query()
            ->where('name', $name)
            ->where('code', $code)
            ->get();
        $this->assertCount(1, $countries);
        $country = $countries->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $country = Country::factory()->create();

        $response = $this->get(route('country.show', $country));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CountryController::class,
            'update',
            \App\Http\Requests\CountryUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $country = Country::factory()->create();
        $name = $this->faker->name;
        $code = $this->faker->word;

        $response = $this->put(route('country.update', $country), [
            'name' => $name,
            'code' => $code,
        ]);

        $country->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($name, $country->name);
        $this->assertEquals($code, $country->code);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $country = Country::factory()->create();

        $response = $this->delete(route('country.destroy', $country));

        $response->assertNoContent();

        $this->assertModelMissing($country);
    }
}
