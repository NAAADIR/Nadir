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
        HotelClass::factory()->count(5)->create();
    }
}
