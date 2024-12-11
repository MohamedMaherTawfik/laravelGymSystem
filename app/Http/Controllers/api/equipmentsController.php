<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\equipments;
use App\Http\Resources\equipmentsResource;

class equipmentsController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $equipments=equipments::all();
        return $this->apiresponse($equipments,'Data Recieved Successfully',200);
    }

    public function show(){
        $equipments=equipments::find(request('id'));
        if(!$equipments){
            return $this->apiresponse(null,'Equipment not found',404);
        }
        return $this->apiresponse(new equipmentsResource($equipments),'Equipment Found Successfully',200);
    }

}
