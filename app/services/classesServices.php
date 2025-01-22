<?php

namespace App\services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\classesRequest;
use App\Models\classes;

class classesServices
{
    use apiresponsetrait;

    public function getAllClasses(){
        $classes = classes::all();
        return $this->apiResponse($classes);
    }

    public function getClassesById(){
        $classes = classes::find(request('id'));
        if(!$classes){
            return $this->apiresponse(null,'Class not found',404);
        }
        return $this->apiresponse($classes,'Class Found Successfully',200);
    }

    public function createClasses(classesRequest $request){
        try {
            $fields=$request->validated();
            $classes = classes::create($fields);
            return $this->apiresponse($classes,'Class created successfully',200);
        } catch (\Throwable $th) {
            return $this->apiresponse(null,$th->getMessage(),400);
        }
    }
}
