<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\membersresource;
use App\Models\Members;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class membersController extends Controller
{
    use apiresponsetrait;

    public function index(){
        $members=Members::latest()->get();
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



    public function store(){
        $validator= Validator::make(request()->all(),[
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
            'membership_type'=>'required',
            'plans_id'=>'required|integer',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }


        $user=Members::create(request()->all());
        if($user){
            return $this->apiResponse($user,'Member Created Successfully',201);
        }
        else{
            return $this->apiResponse(null,'Member Not Created',400);
        }
    }

    public function update()
    {
        $validator= Validator::make(request()->all(),[
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
            'membership_type'=>'required',
            'plans_id'=>'required|integer',
        ]);

        if($validator->fails()){
            return $this->apiResponse(null,$validator->errors(),400);
        }

        $member=Members::find(request('id'));
        if($member){
            $member->update(request()->all());
            return $this->apiResponse($member,'Member Updated Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Member Not Updated',400);
        }
    }

    public function destroy(){
        $member=Members::find(request('id'));
        if($member){
            $member->delete();
            return $this->apiResponse(null,'Member Deleted Successfully',200);
        }
        else{
            return $this->apiResponse(null,'Member Not found',400);
        }
    }
}
