<?php

namespace App\Services;

use App\Http\Controllers\api\apiresponsetrait;
use App\Http\Requests\UsersRequest;
use App\Models\Members;

class membersServices
{
    use apiresponsetrait;
    public function getMembers()
    {
        $members = Members::all();
        return $this->apiresponse($members,'Data Recieved Successfully',200);
    }

    public function getMemberById()
    {
        $member=Members::findOrFail(request('id'));
        if(!$member){
            return $this->apiresponse(null,'Member not found',404);
        }
        return $this->apiresponse($member,'Member Found Successfully',200);
    }


    public function createMember(UsersRequest $request)
    {
        $fields=$request->validated();

        $member=Members::create($fields);

        return $this->apiresponse($member,'Member Created Successfully',200);
    }

    public function updateMember(UsersRequest $request)
    {
        $fields=$request->validated();
        $member=Members::findOrFail(request('id'));
        if(!$member){
            return $this->apiresponse(null,'Member not found',404);
        }
        $member->update($fields);
        return $this->apiresponse($member,'Member Updated Successfully',200);
    }

    public function deleteMember()
    {
        $member=Members::findOrFail(request('id'));
        if(!$member){
            return $this->apiresponse(null,'Member not found',404);
        }
        $member->delete();
        return $this->apiresponse(null,'Member Deleted Successfully',200);
    }

    public function classes()
    {
        $memberclasses=Members::with('classes')->get();
        return $this->apiresponse($memberclasses,'Data Recieved Successfully',200);
    }

    public function attendance()
    {
        $memberattendance=Members::with('attendance')->get();
        return $this->apiresponse($memberattendance,'Data Recieved Successfully',200);
    }

    public function plans()
    {
        $memberplans=Members::with('plans')->get();
        return $this->apiresponse($memberplans,'Data Recieved Successfully',200);
    }

    public function payments()
    {
        $memberpayments=Members::with('payments')->get();
        return $this->apiresponse($memberpayments,'Data Recieved Successfully',200);
    }

    public function feedback()
    {
        $memberfeedback=Members::with('feedback')->get();
        return $this->apiresponse($memberfeedback,'Data Recieved Successfully',200);
    }
}
