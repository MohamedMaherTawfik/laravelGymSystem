<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\paymentsResource;
use App\Models\payments;
use Illuminate\Http\Request;
use App\Models\Members;
use Validator;

class paymentsController extends Controller
{
    use apiresponsetrait;
    public function index()
    {
        $payments=payments::with('member')->latest()->get();
        return $this->apiresponse($payments,'Data Recieved Successfully',200);
    }

    public function show()
    {
        $payments=payments::with('member')->find(request('id'));
        if(!$payments){
            return $this->apiresponse(null,'Payment not found',404);
        }
        return $this->apiresponse(new paymentsResource($payments),'Payment Found Successfully',200);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $payment = payments::create(request()->all());
        if ($payment) {
            return $this->apiResponse($payment, 'Payment Created Successfully', 200);
        } else {
            return $this->apiResponse(null, 'Payment Not Created', 400);
        }
    }

    public function update(){
        $validator = Validator::make(request()->all(), [
            'members_id' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $payment=payments::find(request('id'));
        if (!$payment) {
            return $this->apiResponse(null, 'Payment not found', 404);
        }
        $payment->update(request()->all());
        return $this->apiResponse($payment, 'Payment Updated Successfully', 200);
    }

    public function destroy(){
        $payment=payments::find(request('id'));
        if($payment){
            $payment->delete();
            return $this->apiResponse(null,'Payment Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Payment Not found',400);
        }
    }

}
