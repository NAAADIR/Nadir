<?php

namespace Database\Seeders;

use App\Models\HotelClass;
use Illuminate\Database\Seeder;

class HotelClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('seeders.hotel_classes') as $hotel_class) {
            HotelClass::create($hotel_class);
        }
    }
}
