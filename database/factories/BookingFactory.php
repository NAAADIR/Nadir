<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_at' => $this->faker->date(),
            'end_at' => $this->faker->date(),
            'payment_date' => $this->faker->date(),
            'amount' => $this->faker->randomFloat(2, 0, 999.99),
            'user_id' => User::factory(),
            'payment_id' => Payment::factory(),
        ];
    }
}
