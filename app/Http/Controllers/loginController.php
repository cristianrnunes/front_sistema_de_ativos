<?php

namespace App\Http\Controllers;

use App\Helpers\HelperBaseUrlApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
        public function index (){

            return view('login') ;
        }

        public function auth(Request $request){

            $username = $request->username;
            $password = $request->password;

            $data = HelperBaseUrlApi::baseUrlApi("login");
            
            $response = Http::post( $data, [
                'username' => $username,
                'password' => $password,
            ]);

            $token = json_decode( $response->body());

            if( isset ($token->token)){
                Session::put('token', $token->token); 
                return redirect("/");               
            }elseif(isset ($token->error)){
                return redirect('login')->with("msg" , "Email e/ou senha inválidos!");
            }
        }

        public function logout(){
            Session::forget('token');
            return redirect ('/login');
        }

        public function forgotPassword(){
            return view('forgot_password');
        }

        public function newPassword(){
            return view('new_password');
        }
}
