<?php

namespace App;

class Request
{
    public function getPostData()
    {
        return $_POST;
    }

    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getUrl(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}
