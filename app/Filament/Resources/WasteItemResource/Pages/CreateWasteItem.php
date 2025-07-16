<?php

namespace App\Filament\Resources\WasteItemResource\Pages;

use App\Filament\Resources\WasteItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWasteItem extends CreateRecord
{
    protected static string $resource = WasteItemResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
