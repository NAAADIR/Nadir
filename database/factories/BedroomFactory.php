<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Hotel;

class BedroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bedroom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone_bedroom' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 999.99),
            'image' => $this->faker->word,
            'bedroom_type_id' => BedroomType::factory(),
            'hotel_id' => Hotel::factory(),
        ];
    }
}
