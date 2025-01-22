<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Http\Resources\membersresource;
use App\Models\Members;
use App\Services\membersServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class membersController extends Controller
{
    use apiresponsetrait;

    private $mambersService;

    public function __construct(membersServices $membersService)
    {
        $this->mambersService=$membersService;
    }
    public function index(){
       return $this->mambersService->getMembers();
    }

    public function show(){
        return $this->mambersService->getMemberById();
    }

    public function classes()
    {
        return $this->mambersService->classes();

    }
    public function attendance()
    {
        return $this->mambersService->attendance();
    }

    public function plans()
    {
        return $this->mambersService->plans();
    }

    public function payments()
    {
        return $this->mambersService->payments();
    }

    public function feedback()
    {
        return $this->mambersService->feedback();
    }



    public function store(UsersRequest $request){
        return $this->mambersService->createMember($request);
    }

    public function update(UsersRequest $request)
    {
        return $this->mambersService->updateMember($request);
    }

    public function destroy(){
        return $this->mambersService->deleteMember();
    }
}
