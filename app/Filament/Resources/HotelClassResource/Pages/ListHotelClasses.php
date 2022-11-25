<?php

namespace App\Filament\Resources\HotelClassResource\Pages;

use App\Filament\Resources\HotelClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHotelClasses extends ListRecords
{
    protected static string $resource = HotelClassResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
