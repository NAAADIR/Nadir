<?php

namespace App\Filament\Resources\BenefitPriceResource\Pages;

use App\Filament\Resources\BenefitPriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBenefitPrices extends ListRecords
{
    protected static string $resource = BenefitPriceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
