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
            
            if(isset ($token->token)){
                Session::put('token', $token->token); 
                Session::put('username', $username);
                $this->setPermissionsSession($token->token);
                return redirect("/")->with("msg" , "Olá " . $username );               
            }elseif(isset ($token->error)){
                return redirect('login')->with("msg" , "Email e/ou senha inválidos!");
            }
        }

        public function setPermissionsSession($token){
            $endPointPermissions = HelperBaseUrlApi::baseUrlApi("permissions");

            $tokenBearer = "Bearer " . $token;

            $responsePermissions = Http::withToken(
                $tokenBearer
            )->post(
               $endPointPermissions
            );
            
            $dataResponsePermissions =  $responsePermissions->json();
            Session::put('idUser', $dataResponsePermissions['id']);
            Session::put('typePermission', $dataResponsePermissions['description']);
            Session::put('p_reg_employees', $dataResponsePermissions['p_reg_employees']);
            Session::put('p_reg_sectors', $dataResponsePermissions['p_reg_sectors']);
            Session::put('p_reg_assets', $dataResponsePermissions['p_reg_assets']);
            Session::put('p_man_assets', $dataResponsePermissions['p_man_assets']);
            Session::put('p_track_asset', $dataResponsePermissions['p_track_asset']);
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
