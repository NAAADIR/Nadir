<?php

namespace App\Filament\Resources\BedroomResource\Pages;

use App\Filament\Resources\BedroomResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBedroom extends CreateRecord
{
    protected static string $resource = BedroomResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
