<?php

namespace App\services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\attendanceRequest;
use App\Models\Attendance;

class attendanceServices
{
    use apiresponsetrait;

    public function store(attendanceRequest $request)
    {
        try {
            $fields=$request->validated();
            $attendance = Attendance::create($fields);
            return $this->apiresponse($attendance,'Attendance created successfully',200);
        } catch (\Throwable $th) {
            return $this->apiresponse(null,$th->getMessage(),400);
        }
    }

}
