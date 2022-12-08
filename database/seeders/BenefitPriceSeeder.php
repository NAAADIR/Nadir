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
        foreach(config('seeders.benefit_prices') as $benefit_price) {
            BenefitPrice::create($benefit_price);
        }
    }
}
