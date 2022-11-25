<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UsersStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            // Pour afficher ceux qui ont fait un booking
            Card::make('All Booking', Booking::all()->count()),
        ];
    }
}
