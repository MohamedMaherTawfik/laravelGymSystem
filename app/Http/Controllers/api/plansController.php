<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\plansRequest;
use App\Http\Resources\plansresource;
use App\services\plansServices;
use Illuminate\Http\Request;
use App\Models\Plans;
use Validator;

class plansController extends Controller
{
    use apiresponsetrait;
    private $plansServices;
    public function __construct(plansServices $plansServices)
    {
        $this->plansServices = $plansServices;
    }
    public function store()
    {
        return $this->plansServices->store(request());
    }

}
