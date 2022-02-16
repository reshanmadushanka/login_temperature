<?php

namespace App\Listeners;

use App\Models\Temperature;
use App\Services\TemperatureService;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $temperatureService;

    public function __construct(TemperatureService $temperatureService)
    {
        $this->temperatureService = $temperatureService;
    }

    /**
     * Handle the event.
     *
     * @param \Illuminate\Auth\Events\Login $event
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(Login $event)
    {
        foreach (config('cities') as $city){
            if($tem = $this->temperatureService->get($city)){
                $temperature = new Temperature();
                $temperature->user_id  = $event->user->id;
                $temperature->temperature_celsius  = $tem->main->temp;
                $temperature->temperature_fahrenheit  = (float)(($tem->main->temp * 9 / 5) + 32);
                $temperature->city  = $city;
                $temperature->save();
            };

        }


    }
}
