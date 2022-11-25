<?php

namespace App\Filament\Resources\BenefitResource\Pages;

use App\Filament\Resources\BenefitResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBenefits extends ListRecords
{
    protected static string $resource = BenefitResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
