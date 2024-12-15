<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\plansresource;
use Illuminate\Http\Request;
use App\Models\Plans;
use Validator;

class plansController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $plans=Plans::latest()->get();
        return $this->apiresponse($plans,'Data Recieved Successfully',200);
    }

    public function show(){
        $plans=Plans::find(request('id'));
        if(!$plans){
            return $this->apiresponse(null,'Plan not found',404);
        }
        return $this->apiresponse(new plansresource($plans),'Plan Found Successfully',200);
    }

    public function members()
    {
        $members=Plans::with('members')->find(request('id'));
        return $this->apiresponse($members,'Data Recieved Successfully',200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'description' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $plan = Plans::create(request()->all());
        if ($plan) {
            return $this->apiResponse($plan, 'Plan Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Plan Not Created', 400);
        }
    }

    public function update(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'price' => 'required|integer',
            'description' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $plan=Plans::find(request('id'));
        if($plan){
            $plan->update(request()->all());
            return $this->apiResponse($plan,'Plan Updated Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Plan Not found',400);
        }
    }

    public function destroy(){
        $plan=Plans::find(request('id'));
        if($plan){
            $plan->delete();
            return $this->apiResponse(null,'Plan Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Plan Not found',400);
        }
    }
}
