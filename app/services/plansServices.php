<?php

namespace App\services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\plansRequest;
use App\Models\Plans;

class plansServices
{
    use apiresponsetrait;
    public function store(plansRequest $request)
    {
        $data = $request->validated();
        $plan = Plans::create($data);
        return $this->apiresponse($plan,'Plan Created Successfully',200);
    }


}
