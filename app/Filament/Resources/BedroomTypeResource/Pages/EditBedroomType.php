<?php

namespace App\Filament\Resources\BedroomTypeResource\Pages;

use App\Filament\Resources\BedroomTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBedroomType extends EditRecord
{
    protected static string $resource = BedroomTypeResource::class;

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
