<?php

namespace App\Services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\trainersRequest;
use App\Models\Trainers;

class trainersServices
{
    use apiresponsetrait;

    public function getTrainers(){
        return $this->apiresponse(Trainers::all(),'Data Recieved Successfully',200);
    }

    public function storeTrainers(trainersRequest $request){
        $trainer=Trainers::create($request->validated());
        return $this->apiresponse($trainer,'Trainer Created Successfully',201);
    }

    public function getTrainerById(){
        $trainer=Trainers::findOrFail(request('id'));
        if(!$trainer){
            return $this->apiresponse(null,'Trainer not found',404);
        }
        return $this->apiresponse($trainer,'Trainer Found Successfully',200);
    }

    public function updateTrainer(trainersRequest $request){
        $trainer=Trainers::findOrFail(request('id'));
        if(!$trainer){
            return $this->apiresponse(null,'Trainer not found',404);
        }
        $trainer->update($request->validated());
        return $this->apiresponse($trainer,'Trainer Updated Successfully',200);
    }

    public function destroyTrainer(){
        $trainer=Trainers::findOrFail(request('id'));
        if(!$trainer){
            return $this->apiresponse(null,'Trainer not found',404);
        }
        $trainer->delete();
        return $this->apiresponse(null,'Trainer Deleted Successfully',200);
    }
}
