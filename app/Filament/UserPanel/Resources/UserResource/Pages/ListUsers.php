<?php

namespace App\Filament\UserPanel\Resources\UserResource\Pages;

use App\Filament\UserPanel\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

   protected function getTableQuery(): Builder
    {
        return UserResource::getEloquentQuery()
            ->where('id', Auth::id()); // hanya user yang login
    }

    protected function canCreate(): bool
    {
        return false;
    }
}
