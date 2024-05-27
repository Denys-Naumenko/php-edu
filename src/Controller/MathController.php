<?php

namespace App\Controller;

use App\Request;
use App\Response;
use App\Validator;

class MathController
{
    public function showForm($errors = [], $result = null, $greeting = '')
    {
        require __DIR__ . '/../../views/form.php';
    }

    public function greet()
    {
        $response = new Response();
        $response->send(['message' => 'Привіт, ласкаво просимо до нашого додатку!']);
    }

    public function addNumbers()
    {
        $request = new Request();
        $data = $request->getPostData();

        $validator = new Validator($data, [
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $response = new Response();
            $response->send(['errors' => $validator->errors()], 400);
            return;
        }

        $number1 = $data['number1'];
        $number2 = $data['number2'];
        $result = $number1 + $number2;

        $response = new Response();
        $response->send(['result' => $result]);
    }
}
