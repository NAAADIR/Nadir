<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Address;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AddressController
 */
class AddressControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $addresses = Address::factory()->count(3)->create();

        $response = $this->get(route('address.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'store',
            \App\Http\Requests\AddressStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $street = $this->faker->streetName;
        $country = Country::factory()->create();

        $response = $this->post(route('address.store'), [
            'street' => $street,
            'country_id' => $country->id,
        ]);

        $addresses = Address::query()
            ->where('street', $street)
            ->where('country_id', $country->id)
            ->get();
        $this->assertCount(1, $addresses);
        $address = $addresses->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.show', $address));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AddressController::class,
            'update',
            \App\Http\Requests\AddressUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $address = Address::factory()->create();
        $street = $this->faker->streetName;
        $country = Country::factory()->create();

        $response = $this->put(route('address.update', $address), [
            'street' => $street,
            'country_id' => $country->id,
        ]);

        $address->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($street, $address->street);
        $this->assertEquals($country->id, $address->country_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $address = Address::factory()->create();

        $response = $this->delete(route('address.destroy', $address));

        $response->assertNoContent();

        $this->assertModelMissing($address);
    }
}
