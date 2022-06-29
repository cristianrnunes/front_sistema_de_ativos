<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HelperAux
{

    public static function getAllUsers(){
        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointUsers);
    
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return json_decode($response);
        }else{
            return null;
        }
    }


    public function getUserById($id){

        $token = Session::get('token');

        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee");

        $response = Http::withToken(
            $token
        )->get($endPointUsers);

        $users = json_decode($response);
    
        $user ='';
        foreach ($users as $u) {
            if($u->id == $id){
                $user = $u;
            }
        }

        return  $user->name;
    }

    public function getAllSectors(){
        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointSectors);

        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return json_decode($response);
        }else{
            return null;
        }
    }

    public function getSectorById($id){

        $token = Session::get('token');

        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); 

        $response = Http::withToken(
            $token
        )->get($endPointSectors);

        $sectors = json_decode($response);
    
        $sector ='';
        foreach ($sectors as $s) {
            if($s->id == $id){
                $sector = $s;
            }
        }

        return $sector->name;
    }

    
}
