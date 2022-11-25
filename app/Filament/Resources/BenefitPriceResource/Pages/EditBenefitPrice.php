<?php

namespace App\Filament\Resources\BenefitPriceResource\Pages;

use App\Filament\Resources\BenefitPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBenefitPrice extends EditRecord
{
    protected static string $resource = BenefitPriceResource::class;

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
