<?php

namespace App\Http\Controllers\api;

trait apiresponsetrait
{
    public function apiresponse($data=null,$message=null, $status=null)
    {
        $array=[
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ];
        return response($array);
    }
}
