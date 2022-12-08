<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Country;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'street' => $this->faker->streetName,
            'complement1' => $this->faker->word,
            'complement2' => $this->faker->word,
            'postcode' => $this->faker->postcode,
            'city' => $this->faker->city,
            'appartment_number' => $this->faker->word,
            'country_id' => Country::factory(),
        ];
    }
}
