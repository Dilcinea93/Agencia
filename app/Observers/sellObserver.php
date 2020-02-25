<?php

namespace App\Observers;

use App\client;
use Illuminate\Support\Facades\Log;

class sellObserver
{
    //
    public function created(client $client)
    {
    }

    /**
     * Handle the living place "updated" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function updated(client $client)
    {
    }

    /**
     * Handle the living place "deleted" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function deleted(client $client)
    {
        //
    }

    /**
     * Handle the living place "restored" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function restored(client $client)
    {
        //
    }

    /**
     * Handle the living place "force deleted" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function forceDeleted(client $client)
    {
        //
    }

}
