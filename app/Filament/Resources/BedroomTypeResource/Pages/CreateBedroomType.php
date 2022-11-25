<?php

namespace App\Filament\Resources\BedroomTypeResource\Pages;

use App\Filament\Resources\BedroomTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBedroomType extends CreateRecord
{
    protected static string $resource = BedroomTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
