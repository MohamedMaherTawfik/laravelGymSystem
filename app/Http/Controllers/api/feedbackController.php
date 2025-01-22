<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Http\Resources\feedbackResource;
use Validator;
use App\services\feedbackServices;
use App\Http\Requests\feedbackRequest;

class feedbackController extends Controller
{
    use apiresponsetrait;
    private $feedbackServices;

    public function __construct(feedbackServices $feedbackServices)
    {
        $this->feedbackServices = $feedbackServices;
    }

    public function index()
    {
        return $this->feedbackServices->getAllfeedback();
    }

    public function store(feedbackRequest $request)
    {
        return $this->feedbackServices->createfeedback($request);
    }

    public function show()
    {
        return $this->feedbackServices->getfeedbackById();
    }

    public function update(feedbackRequest $request)
    {
        return $this->feedbackServices->updatefeedback($request);
    }

    public function destroy()
    {
        return $this->feedbackServices->deletefeedback();
    }
}
