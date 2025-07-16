<?php

namespace App\Observers;

use App\Models\WasteDeposit;
use App\Models\WasteItem;

class WasteDepositObserver
{
    /**
     * Handle the WasteDeposit "created" event.
     */
    public function created(WasteDeposit $wasteDeposit): void
    {
        if ($wasteDeposit->user && $wasteDeposit->total_amount > 0) {
            $wasteDeposit->user->increment('balance', $wasteDeposit->total_amount);
        }
    }

    /**
     * Handle the WasteDeposit "updated" event.
     */
    public function updated(WasteDeposit $wasteDeposit): void
    {
        //
    }

    /**
     * Handle the WasteDeposit "deleted" event.
     */
    public function deleted(WasteDeposit $wasteDeposit): void
    {
        //
    }

    /**
     * Handle the WasteDeposit "restored" event.
     */
    public function restored(WasteDeposit $wasteDeposit): void
    {
        //
    }

    /**
     * Handle the WasteDeposit "force deleted" event.
     */
    public function forceDeleted(WasteDeposit $wasteDeposit): void
    {
        //
    }
}
