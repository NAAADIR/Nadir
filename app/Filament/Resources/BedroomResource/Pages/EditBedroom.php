<?php

namespace App\Filament\Resources\BedroomResource\Pages;

use App\Filament\Resources\BedroomResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBedroom extends EditRecord
{
    protected static string $resource = BedroomResource::class;

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
