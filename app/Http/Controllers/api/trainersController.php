<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;
use App\Http\Resources\trainersresource;
use Validator;

class trainersController extends Controller
{
    use apiresponsetrait;
    public function index(){
        $trainers=Trainers::latest()->get();
        return $this->apiresponse($trainers,'Data Recieved Successfully',200);
    }

    public function show(){
        $trainers=Trainers::find(request('id'));
        if(!$trainers){
            return $this->apiresponse(null,'Trainer not found',404);
        }
        return $this->apiresponse(new trainersresource($trainers),'Trainer Found Successfully',200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'hire_date' => '',
            'speciality' => 'required',
            'salary' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $trainer = Trainers::create(request()->all());
        if ($trainer) {
            return $this->apiResponse($trainer, 'Trainer Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Trainer Not Created', 400);
        }
    }

    public function update()
    {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'hire_date' => '',
            'speciality' => 'required',
            'salary' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $trainer = Trainers::find(request('id'));
        if ($trainer) {
            $trainer->update(request()->all());
            return $this->apiResponse($trainer, 'Trainer Updated Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Trainer Not Updated', 400);
        }
    }

    public function destroy()
    {
        $trainer = Trainers::find(request('id'));
        if ($trainer) {
            $trainer->delete();
            return $this->apiResponse(null, 'Trainer Deleted Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Trainer Not found', 400);
        }
    }
}
