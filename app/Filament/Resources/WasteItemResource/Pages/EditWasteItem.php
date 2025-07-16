<?php

namespace App\Filament\Resources\WasteItemResource\Pages;

use App\Filament\Resources\WasteItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWasteItem extends EditRecord
{
    protected static string $resource = WasteItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
