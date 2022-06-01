<?php

namespace App\Http\Controllers;

use App\Helpers\HelperBaseUrlApi;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class loginController extends Controller
{
        public function index (){

            return view('login') ;
        }

        public function auth(Request $request){

            $username = $request->username;
            $password = $request->password;

            $data = HelperBaseUrlApi::baseUrlApi("login");
            
            $response = Http::asForm()->post( $data, [
                'username' => $username,
                'password' => $password,
            ]);

            $token = json_decode( $response->body());
            // dd($token->error);
            if( isset ($token->token)){
               return redirect ("/");
            }else{
                return redirect('login')->with("msg" , "Email e/ou senha inválidos!");
            }
        }

        public function forgotPassword(){
            return view('forgot_password');
        }

        public function newPassword(){
            return view('new_password');
        }
}
