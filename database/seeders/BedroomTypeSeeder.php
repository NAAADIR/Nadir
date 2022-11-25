<?php

namespace Database\Seeders;

use App\Models\BedroomType;
use Illuminate\Database\Seeder;

class BedroomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BedroomType::factory()->count(5)->create();
    }
}
