<?php

namespace App\Http\Controllers;

use App\Http\Resources\TemperatureResource;
use App\Repositories\TemperatureRepository;
use Illuminate\Http\Request;
use cache;

class TemperatureController extends Controller
{
    private $temperatureRepo;

    /**
     * @param TemperatureRepository $temperatureRepo
     */
    public function __construct(TemperatureRepository $temperatureRepo)
    {
        $this->temperatureRepo = $temperatureRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->temperatureRepo->get();
        return TemperatureResource::collection($data)->groupBy('city');
    }
}
