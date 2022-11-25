<?php

namespace App\Filament\Resources\BenefitPriceResource\Pages;

use App\Filament\Resources\BenefitPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBenefitPrice extends CreateRecord
{
    protected static string $resource = BenefitPriceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
