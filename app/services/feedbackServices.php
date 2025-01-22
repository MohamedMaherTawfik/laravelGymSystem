<?php

namespace App\services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\feedbackRequest;
use App\Models\feedback;

class feedbackServices
{
    use apiresponsetrait;

    public function getAllfeedback(){
        $feedback = feedback::all();
        return $this->apiResponse($feedback);
    }

    public function getfeedbackById(){
        $feedback = feedback::find(request('id'));
        if (!$feedback) {
            return $this->apiResponse(null, 'feedback not found', 404);
        }
        return $this->apiResponse($feedback);
    }

    public function createfeedback(feedbackRequest $request){
        try {
            $fields=$request->validated();
            $feedback = feedback::create($fields);
            return $this->apiresponse($feedback,'feedback created successfully',200);
        } catch (\Throwable $th) {
            return $this->apiresponse(null,$th->getMessage(),400);
        }
    }

    public function updatefeedback(feedbackRequest $request){
        try {
            $fields=$request->validated();
            $feedback = feedback::find(request('id'));
            if (!$feedback) {
                return $this->apiResponse(null, 'feedback not found', 404);
            }
            $feedback->update($fields);
            return $this->apiResponse($feedback, 'feedback updated successfully', 200);
        } catch (\Throwable $th) {
            return $this->apiResponse(null, $th->getMessage(), 400);
        }
    }

    public function deletefeedback(){
        try {
            $feedback = feedback::find(request('id'));
            if (!$feedback) {
                return $this->apiResponse(null, 'feedback not found', 404);
            }
            $feedback->delete();
            return $this->apiResponse($feedback, 'feedback deleted successfully', 200);
        } catch (\Throwable $th) {
            return $this->apiResponse(null, $th->getMessage(), 400);
        }
    }
}
