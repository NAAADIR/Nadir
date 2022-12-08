<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Benefit;
use App\Models\BenefitPrice;
use App\Models\Booking;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaymentTypeSeeder::class,
            PaymentSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            AddressSeeder::class,
            BenefitPriceSeeder::class,
            BedroomTypeSeeder::class,
            HotelClassSeeder::class,
            HotelSeeder::class,
            BedroomSeeder::class,
            BenefitSeeder::class,
            
            
            
            
            BookingSeeder::class,
        ]);
    }
}
