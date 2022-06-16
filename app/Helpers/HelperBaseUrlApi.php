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

    // public  function countItemsByEndpoint($value){

    //     $token = Session::get('token');

    //     $endPoint = static::baseUrlApi($value);
    

    //     $response = Http::withToken(
    //         $token
    //     )->fake($endPoint, [
    //         'COUNT'
    //     ]);

    //    dd( $response->json());

        // $count = 0;
        // foreach($response as $r) {
        //     $count++;
        // }
        // return $count;
    // }
}