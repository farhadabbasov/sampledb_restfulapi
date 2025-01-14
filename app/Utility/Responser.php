<?php

namespace App\Utility;

use App\Constants\ApiMessages;

class Responser
{
    public static function json($data = [], $message = ApiMessages::SUCCESS,$status = 200){

        $responseObject = [
            'data' => $data,
            'message' => $message,
            'status' => $status
        ];

        return response()->json($responseObject,$status);
    }
}
