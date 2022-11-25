<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\PaymentType;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'creditCardName' => $this->faker->word,
            'creditCardNumber' => $this->faker->word,
            'creditCardExpirationDate' => $this->faker->date(),
            'cvv' => $this->faker->numberBetween(-10000, 10000),
            'start_at' => $this->faker->dateTime(),
            'end_at' => $this->faker->dateTime(),
            'payment_type_id' => PaymentType::factory(),
        ];
    }
}
