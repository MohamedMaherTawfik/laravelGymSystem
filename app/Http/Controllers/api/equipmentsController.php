<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\equipments;
use App\Http\Resources\equipmentsResource;
use Validator;

class equipmentsController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $equipments=equipments::latest()->get();
        return $this->apiresponse($equipments,'Data Recieved Successfully',200);
    }

    public function show(){
        $equipments=equipments::find(request('id'));
        if(!$equipments){
            return $this->apiresponse(null,'Equipment not found',404);
        }
        return $this->apiresponse(new equipmentsResource($equipments),'Equipment Found Successfully',200);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'categorey' => 'required',
            'status' => 'required',
            'purchase_date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $equipment = equipments::create(request()->all());
        if ($equipment) {
            return $this->apiResponse($equipment, 'Equipment Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Equipment Not Created', 400);
        }
    }

    public function destroy(){
        $equipment=equipments::find(request('id'));
        if($equipment){
            $equipment->delete();
            return $this->apiResponse(null,'Equipment Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Equipment Not found',400);
        }
    }

    public function update(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'categorey' => 'required',
            'status' => 'required',
            'purchase_date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $equipment=equipments::find(request('id'));
        if($equipment){
            $equipment->update(request()->all());
            return $this->apiResponse($equipment,'Equipment Updated Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Equipment Not found',400);
        }
    }



}
