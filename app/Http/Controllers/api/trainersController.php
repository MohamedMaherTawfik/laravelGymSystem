<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;
use App\Http\Resources\trainersresource;
use Validator;
use App\Services\trainersServices;

class trainersController extends Controller
{
    use apiresponsetrait;

    private $trainersServices;
    public function __construct(trainersServices $trainersServices)
    {
        $this->trainersServices=$trainersServices;
    }
    public function index(){
        return $this->trainersServices->getTrainers();
    }

    public function show(){
        return $this->trainersServices->getTrainerById();
    }

    public function store()
    {
        return $this->trainersServices->storeTrainers(request());
    }

    public function update()
    {
        return $this->trainersServices->updateTrainer(request());
    }

    public function destroy()
    {
        return $this->trainersServices->destroyTrainer();
    }
}

