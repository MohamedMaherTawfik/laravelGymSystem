<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\attendanceResource;
use Illuminate\Http\Request;
use App\Models\attendance;
use Validator;


class attendanceController extends Controller
{
    use apiresponsetrait;

    public function index()
    {
        $attendance = attendance::latest()->get();
        return $this->apiresponse($attendance,'Data Recieved Successfully',200);
    }

    public function show(){
        $attendance=attendance::with('members')->find(request('id'));
        if(!$attendance){
            return $this->apiresponse(null,'Attendance not found',404);
        }
        return $this->apiresponse(new attendanceResource($attendance),'Attendance Found Successfully',200);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required',
            'date' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $attendance = attendance::create(request()->all());
        if ($attendance) {
            return $this->apiResponse($attendance, 'Attendance Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Attendance Not Created', 400);
        }
    }

    public function update(){
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required',
            'date' => 'required',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $attendance=attendance::find(request('id'));
        if($attendance){
            $attendance->update(request()->all());
            return $this->apiResponse($attendance,'Attendance Updated Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Attendance Not found',400);
        }
    }

    public function destroy(){
        $attendance=attendance::find(request('id'));
        if($attendance){
            $attendance->delete();
            return $this->apiResponse(null,'Attendance Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Attendance Not found',400);
        }
    }
}
