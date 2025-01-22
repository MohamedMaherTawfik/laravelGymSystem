<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\attendanceRequest;
use App\Http\Resources\attendanceResource;
use Illuminate\Http\Request;
use App\Models\attendance;
use Validator;
use App\services\attendanceServices;

class attendanceController extends Controller
{
    use apiresponsetrait;
    private $attendanceService;
    public function __construct(attendanceServices $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }
    public function store(attendanceRequest $request)
    {
        return $this->attendanceService->store($request);
    }
}
