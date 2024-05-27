<?php

namespace App\Traits;

use App\Response;

trait JsonResponseTrait
{
    public function sendJsonResponse($data, $statusCode = 200)
    {
        $response = new Response();
        $response->send($data, $statusCode);
    }
}
