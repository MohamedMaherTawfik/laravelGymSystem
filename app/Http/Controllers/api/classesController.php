<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Http\Resources\classesResource;
use Validator;

class classesController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $classes=Classes::latest()->get();
        return $this->apiresponse($classes,'Data Recieved Successfully',200);
    }

    public function show(){
        $classes=Classes::find(request('id'));
        if(!$classes){
            return $this->apiresponse(null,'Class not found',404);
        }
        return $this->apiresponse(new classesResource($classes),'Class Found Successfully',200);
    }
    public function members()
    {
        $members=Classes::with('members')->find(request('id'));
        return $this->apiresponse($members,'Data Recieved Successfully',200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'trainers_id' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|integer',
            'max_participants' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $class = Classes::create(request()->all());
        if ($class) {
            return $this->apiResponse($class, 'Class Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Class Not Created', 400);
        }
    }

    public function update()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|min:3',
            'trainers_id' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'price' => 'required|integer',
            'max_participants' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $class=Classes::find(request('id'));
        if($class){
            $class->update(request()->all());
            return $this->apiResponse($class,'Class Updated Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Class Not found',400);
        }
    }

    public function destroy(){
        $class=Classes::find(request('id'));
        if($class){
            $class->delete();
            return $this->apiResponse(null,'Class Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Class Not found',400);
        }
    }
}
