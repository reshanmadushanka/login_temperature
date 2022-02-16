<?php

namespace App\Repositories;

use App\Models\Temperature;
use Cache;
use Schema;

/**
 * data store to db
 */
class TemperatureRepository
{
    protected $temperature;

    public function __construct(Temperature $temperature)
    {
        $this->temperature = $temperature;
    }

    public function create($data = [])
    {
        $temper = new Temperature();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        //        return Cache('temperature', function () {
        $temp = $this->temperature->newQuery();
        $temp->where('user_id', auth()->user()->id);
        if (request('orderby') != '') {
            if (Schema::hasColumn('temperatures', request('orderby'))) {
                $temp->orderBy(request('orderby'), 'DESC');
            }
        } else {
            //default sorting
            $temp->orderBy('created_at', 'DESC');
        }
       return $temp->get();
        //        });
    }
}
