<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TemperatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'celsius'=> $this->temperature_celsius,
            'fahrenheit'=> $this->temperature_fahrenheit,
            'city'=> $this->city,
            'created_at'=> Carbon::parse($this->created_at)->toDayDateTimeString(),
        ];
    }
}
