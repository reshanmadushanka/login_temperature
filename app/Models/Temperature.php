<?php

namespace App\Models;

use App\Events\TemperatureCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = [
        'created_at'
    ];

    protected $dispatchesEvents = [
        'created' => TemperatureCreated::class //When a Temperature is created then this Event will be fired
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
