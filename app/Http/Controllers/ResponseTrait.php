<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait ResponseTrait
{
    public function responseSuccess($data, $message='') : JsonResponse
    {
        return response()->json([
            "success" => true,
            "data" => $data,
            "message" => $message
        ]);
    }
    public function errorResponse($data, $message='' ,$status ) : JsonResponse
    {
        return response()->json([
            "success" => false,
            "data" => $data->getCollection(),
            "message" => $message
        ] , $status);
    }
}