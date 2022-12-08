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
        foreach(config('seeders.bedroom_types') as $bedroom_type) {
            BedroomType::create($bedroom_type);
        }
    }
}
