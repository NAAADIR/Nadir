<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Bedroom;
use App\Models\Benefit;
use App\Models\BenefitPrice;
use App\Models\User;

class BenefitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Benefit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'start_at' => $this->faker->dateTime(),
            'end_at' => $this->faker->dateTime(),
            'duration' => $this->faker->dateTime(),
            'image' => $this->faker->word,
            'bedroom_id' => Bedroom::factory(),
            'benefit_price_id' => BenefitPrice::factory(),
            'user_id' => User::factory(),
        ];
    }
}
