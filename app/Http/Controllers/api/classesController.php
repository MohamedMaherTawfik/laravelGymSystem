<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Http\Resources\classesResource;

class classesController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $classes=Classes::get();
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
}
