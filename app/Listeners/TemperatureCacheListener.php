<?php

namespace App\Listeners;

use App\Models\Temperature;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Cache;;

class TemperatureCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Cache()->forget('temperature'); //forget all the cache data initially

        $temp = Temperature::where('user_id',auth()->user()->id)->get(); //fetch all data

        Cache()->forever('temperature', $temp); // and put them into cache forever
    }
}
