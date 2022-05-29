<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
        public function index (){
            return view('login') ;
        }

        public function forgotPassword(){
            return view('forgot_password');
        }

        public function newPassword(){
            return view('new_password');
        }
}
