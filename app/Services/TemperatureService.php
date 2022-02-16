<?php

namespace App\Services;


use GuzzleHttp\Exception\GuzzleException;

class TemperatureService
{
    /**
     * @return mixed
     * @throws GuzzleException
     * call api and get data current time
     */
    public function get($city)
    {
        try {
            $app_id = config("weather.weather_api_key");
            $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&appid=" . $app_id;
            $client = new \GuzzleHttp\Client();
            $res = $client->get($url);
            if ($res->getStatusCode() == 200) {
                $j = $res->getBody();
                $obj = json_decode($j);
            }
            return $obj;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
