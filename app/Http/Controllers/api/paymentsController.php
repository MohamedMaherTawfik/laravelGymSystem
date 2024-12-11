<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\paymentsResource;
use App\Models\payments;
use Illuminate\Http\Request;
use App\Models\Members;

class paymentsController extends Controller
{
    use apiresponsetrait;
    public function index()
    {
        $payments=payments::get();
        return $this->apiresponse($payments,'Data Recieved Successfully',200);
    }

    public function show()
    {
        $payments=payments::find(request('id'));
        if(!$payments){
            return $this->apiresponse(null,'Payment not found',404);
        }
        return $this->apiresponse(new paymentsResource($payments),'Payment Found Successfully',200);
    }

}
