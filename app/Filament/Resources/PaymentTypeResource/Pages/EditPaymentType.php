<?php

namespace App\Filament\Resources\PaymentTypeResource\Pages;

use App\Filament\Resources\PaymentTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentType extends EditRecord
{
    protected static string $resource = PaymentTypeResource::class;

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
