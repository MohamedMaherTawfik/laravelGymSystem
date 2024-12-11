<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainers;
use App\Http\Resources\trainersresource;

class trainersController extends Controller
{
    use apiresponsetrait;
    public function index(){
        $trainers=Trainers::all();
        return $this->apiresponse($trainers,'Data Recieved Successfully',200);
    }

    public function show(){
        $trainers=Trainers::find(request('id'));
        if(!$trainers){
            return $this->apiresponse(null,'Trainer not found',404);
        }
        return $this->apiresponse(new trainersresource($trainers),'Trainer Found Successfully',200);
    }
}
