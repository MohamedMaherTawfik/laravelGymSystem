<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\plansresource;
use Illuminate\Http\Request;
use App\Models\Plans;

class plansController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $plans=Plans::all();
        return $this->apiresponse($plans,'Data Recieved Successfully',200);
    }

    public function show(){
        $plans=Plans::find(request('id'));
        if(!$plans){
            return $this->apiresponse(null,'Plan not found',404);
        }
        return $this->apiresponse(new plansresource($plans),'Plan Found Successfully',200);
    }

    public function members()
    {
        $members=Plans::with('members')->find(request('id'));
        return $this->apiresponse($members,'Data Recieved Successfully',200);
    }
}
