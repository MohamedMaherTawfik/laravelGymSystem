<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\services\classesServices;
use App\Http\Requests\classesRequest;

class classesController extends Controller
{
    use apiresponsetrait;
    private $classesServices;

    public function __construct(classesServices $classesServices){
        $this->classesServices = $classesServices;
    }

    public function index(){
        return $this->classesServices->getAllClasses();
    }

    public function show(){
        return $this->classesServices->getClassesById();
    }

    public function store(classesRequest $request){
        return $this->classesServices->createClasses($request);
    }

}
