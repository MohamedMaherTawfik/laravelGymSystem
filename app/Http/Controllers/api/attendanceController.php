<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\attendanceResource;
use Illuminate\Http\Request;
use App\Models\attendance;


class attendanceController extends Controller
{
    use apiresponsetrait;

    public function index()
    {
        $attendance = attendance::all();
        return $this->apiresponse($attendance,'Data Recieved Successfully',200);
    }

    public function show(){
        $attendance=attendance::find(request('id'));
        if(!$attendance){
            return $this->apiresponse(null,'Attendance not found',404);
        }
        return $this->apiresponse(new attendanceResource($attendance),'Attendance Found Successfully',200);
    }
}
