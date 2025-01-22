<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\equipments;
use App\Http\Requests\equipmentsRequest;
use App\services\equipmentsServices;

class equipmentsController extends Controller
{
    use apiresponsetrait;
    private $services;
    public function __construct(equipmentsServices $services)
    {
        $this->services = $services;
    }
    public function store(equipmentsRequest $request)
    {
        return $this->services->create($request);
    }

}
