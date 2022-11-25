<?php

namespace Database\Seeders;

use App\Models\BenefitPrice;
use Illuminate\Database\Seeder;

class BenefitPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BenefitPrice::factory()->count(5)->create();
    }
}
