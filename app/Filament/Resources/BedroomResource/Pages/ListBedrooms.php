<?php

namespace App\Filament\Resources\BedroomResource\Pages;

use App\Filament\Resources\BedroomResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBedrooms extends ListRecords
{
    protected static string $resource = BedroomResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
