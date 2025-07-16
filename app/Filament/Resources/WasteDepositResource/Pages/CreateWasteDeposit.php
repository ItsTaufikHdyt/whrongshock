<?php

namespace App\Filament\Resources\WasteDepositResource\Pages;

use App\Filament\Resources\WasteDepositResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWasteDeposit extends CreateRecord
{
    protected static string $resource = WasteDepositResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
