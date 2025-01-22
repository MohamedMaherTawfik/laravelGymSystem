<?php

namespace App\services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\equipmentsRequest;
use App\Models\equipments;

class equipmentsServices
{
    use apiresponsetrait;
    public function create(equipmentsRequest $request)
    {
        $data=$request->validated();
        $equipments = equipments::create($data);
        return $this->apiResponse($equipments,'Equipment Created Successfully',200);
    }

}
