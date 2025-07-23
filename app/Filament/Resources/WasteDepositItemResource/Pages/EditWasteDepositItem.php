<?php

namespace App\Filament\Resources\WasteDepositItemResource\Pages;

use App\Filament\Resources\WasteDepositItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWasteDepositItem extends EditRecord
{
    protected static string $resource = WasteDepositItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
