<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HelperBaseUrlApi
{
    public static function baseUrlApi($value)
    {
        return "http://127.0.0.1/AtiveX/api/?endpoint=" . $value;
    }
}