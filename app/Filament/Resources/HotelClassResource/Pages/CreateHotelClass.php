<?php

namespace App\Filament\Resources\HotelClassResource\Pages;

use App\Filament\Resources\HotelClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHotelClass extends CreateRecord
{
    protected static string $resource = HotelClassResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
