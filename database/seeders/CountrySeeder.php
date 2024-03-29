<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Country::factory(20)->create();

        foreach(config('seeders.countries') as $country) {
            Country::create($country);
        }
    }
}
