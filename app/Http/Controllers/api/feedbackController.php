<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Http\Resources\feedbackResource;
use Validator;

class feedbackController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $feedback=feedback::latest()->get();
        return $this->apiresponse($feedback,'Data Recieved Successfully',200);
    }

    public function show(){
        $feedback=feedback::with('member')->find(request('id'));
        if(!$feedback){
            return $this->apiresponse(null,'Feedback not found',404);
        }
        return $this->apiresponse(new feedbackResource($feedback),'Feedback Found Successfully',200);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required|integer',
            'feedback' => 'required|string',
            'feedback_date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $feedback = feedback::create(request()->all());
        if ($feedback) {
            return $this->apiResponse($feedback, 'Feedback Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Feedback Not Created', 400);
        }
    }

    public function update(){
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required|integer',
            'feedback' => 'required',
            'feedback_date' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $feedback=feedback::find(request('id'));
        if (!$feedback) {
            return $this->apiResponse(null, 'Feedback not found', 404);
        }
        $feedback->update(request()->all());
        return $this->apiResponse($feedback, 'Feedback Updated Successfully', 200);
    }

    public function destroy(){
        $feedback=feedback::find(request('id'));
        if (!$feedback) {
            return $this->apiResponse(null, 'Feedback not found', 404);
        }
        $feedback->delete();
        return $this->apiResponse(null, 'Feedback Deleted Successfully', 200);
    }
}
