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

    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'created' => TemperatureCreated::class //When a Temperature is created then this Event will be fired
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
