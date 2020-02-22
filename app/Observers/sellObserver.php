<?php

namespace App\Observers;

use App\venta;
use Illuminate\Support\Facades\Log;

class sellObserver
{
    //
    public function created(venta $venta)
    {
        /*quiero guardar en la tabla venta cuando se guarde un registro en la tabla client.
        Como traigo los datos que se estan guardando en la tabla del modelo observado?*/
        $venta->id_client='1';
        $venta->id_user='1';
        $venta->id_user='24';
        $venta->save();
        log::info($venta);
    }

    /**
     * Handle the living place "updated" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function updated(venta $venta)
    {
    }

    /**
     * Handle the living place "deleted" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function deleted(venta $venta)
    {
        //
    }

    /**
     * Handle the living place "restored" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function restored(venta $venta)
    {
        //
    }

    /**
     * Handle the living place "force deleted" event.
     *
     * @param  \App\Models\LivingPlace  $livingPlace
     * @return void
     */
    public function forceDeleted(venta $venta)
    {
        //
    }

}
