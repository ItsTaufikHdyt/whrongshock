<?php

namespace App\Filament\UserPanel\Resources\UserResource\Pages;

use App\Filament\UserPanel\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Hapus delete jika tidak perlu
            // Actions\DeleteAction::make(),
        ];
    }

    protected function resolveRecord(mixed $key): Model
    {
        $user = Auth::user();

        // Pastikan instance-nya benar-benar model User
        if (! $user instanceof User) {
            throw (new ModelNotFoundException())->setModel(User::class);
        }

        return $user;
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
