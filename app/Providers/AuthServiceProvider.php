<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Address' => 'App\Policies\AddressPolicy',
        'App\Models\Bedroom' => 'App\Policies\BedroomPolicy',
        'App\Models\BedroomType' => 'App\Policies\BedroomTypePolicy',
        'App\Models\Benefit' => 'App\Policies\BenefitPolicy',
        'App\Models\BenefitPrice' => 'App\Policies\BenefitPricePolicy',
        'App\Models\Booking' => 'App\Policies\BookingPolicy',
        'App\Models\Country' => 'App\Policies\CountryPolicy',
        'App\Models\HotelClass' => 'App\Policies\HotelClassPolicy',
        'App\Models\Payment' => 'App\Policies\PaymentPolicy',
        'App\Models\PaymentType' => 'App\Policies\PaymentTypePolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isSuperAdmin', function($user) {
            return $user->role == 'superadmin';
        });

        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('User', function($user) {
            return $user->role == 'user';
        });
    }
}
