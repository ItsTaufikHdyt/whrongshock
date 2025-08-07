<?php

namespace App\Observers;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the map "created" event.
     */
    public function created(User $user): void
    {
        if ($user->isDirty('image')) {
            $image = $user->getOriginal('image');
            if ($image) {
                Storage::disk('public')->delete($image);
            }
        }
    }

    /**
     * Handle the map "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->isDirty('image')) {
            $image = $user->getOriginal('image');
            if ($image) {
                Storage::disk('public')->delete($image);
            }
        }
    }

    /**
     * Handle the map "deleted" event.
     */
    public function deleted(User $user): void
    {
        if (! is_null($user->image)) {
            Storage::disk('public')->delete($user->image);
        }
    }

    /**
     * Handle the map "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the map "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
