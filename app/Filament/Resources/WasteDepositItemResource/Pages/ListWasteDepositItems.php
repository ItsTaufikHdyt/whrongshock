<?php

namespace App\Filament\Resources\WasteDepositItemResource\Pages;

use App\Filament\Resources\WasteDepositItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWasteDepositItems extends ListRecords
{
    protected static string $resource = WasteDepositItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
