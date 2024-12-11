<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\membersresource;
use App\Models\Members;
use Illuminate\Http\Request;


class membersController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $members=Members::get();
        return $this->apiresponse($members,'Data Recieved Successfully',200);
    }

    public function show(){
        $members=Members::find(request('id'));
        if(!$members){
            return $this->apiresponse(null,'Member not found',404);
        }
        return $this->apiresponse(new membersresource($members),'Member Found Successfully',200);
    }

    public function classes()
    {
        $member_classes=Members::with('classes')->find(request('id'));
        return $this->apiresponse($member_classes,'Data Recieved Successfully',200);

    }
    public function attendance()
    {
        $member_attendances=Members::with('attendance')->find(request('id'));
        return $this->apiresponse($member_attendances,'Data Recieved Successfully',200);
    }

    public function plans()
    {
        $member_plans=Members::with('plans')->find(request('id'));
        return $this->apiresponse($member_plans,'Data Recieved Successfully',200);
    }

    public function payments()
    {
        $member_payments=Members::with('payments')->find(request('id'));
        return $this->apiresponse($member_payments,'Data Recieved Successfully',200);
    }

    public function feedback()
    {
        $member_feedback=Members::with('feedback')->find(request('id'));
        return $this->apiresponse($member_feedback,'Data Recieved Successfully',200);
    }
}
