<?php

namespace App\Helpers;

class HelperBaseUrlApi
{
    public static function baseUrlApi($value)
    {
        return "http://127.0.0.1/api_ativex/AtiveX/api/?endpoint=" . $value;
    }
}