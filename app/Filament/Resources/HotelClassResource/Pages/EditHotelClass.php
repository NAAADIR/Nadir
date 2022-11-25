<?php

namespace App\Filament\Resources\HotelClassResource\Pages;

use App\Filament\Resources\HotelClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHotelClass extends EditRecord
{
    protected static string $resource = HotelClassResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
