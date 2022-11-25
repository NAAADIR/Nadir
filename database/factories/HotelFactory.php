<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\HotelClass;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

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
            'postcode' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->word,
            'hotel_class_id' => HotelClass::factory(),
        ];
    }
}
