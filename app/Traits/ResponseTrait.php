<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait {

    public function responseSuccess($data, $message='Success'):JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null

        ]);
    }

    public function responseError($errors, $message='Error'):JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors

        ]);
    }



}