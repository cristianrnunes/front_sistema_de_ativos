<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PainelController extends Controller
{
    public function index(){

        if(Session::exists('token')){
            return view('index');
        }else{
            return redirect('login');
        }
    }
}
