<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Http\Resources\feedbackResource;

class feedbackController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $feedback=feedback::get();
        return $this->apiresponse($feedback,'Data Recieved Successfully',200);
    }

    public function show(){
        $feedback=feedback::find(request('id'));
        if(!$feedback){
            return $this->apiresponse(null,'Feedback not found',404);
        }
        return $this->apiresponse(new feedbackResource($feedback),'Feedback Found Successfully',200);
    }
}
