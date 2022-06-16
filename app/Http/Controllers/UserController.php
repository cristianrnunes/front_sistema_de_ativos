<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\HelperBaseUrlApi;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\countOf;

class UserController extends Controller
{
    
    public function index(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
            $dataUsers = $this->getUsers();
            return view('users', [
                'users' => json_decode($dataUsers),
            ]);
        }else{
            return redirect('/');
        }    
    }

    public function getUsers(){
        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointUsers);
    
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return $response;
        }else{
            return 0;
        }
    }
    
    public function viewAddUser(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
        return view('addUser');
        }else{
            return redirect('/');
        }
    }
    
    public function viewEditUser($id){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
           
            $user = $this->getUserById($id);

            return view('editUser',[
                'id' => $id,
                'user' =>  $user
            ]);
        
        }else{
            return redirect('/');
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

        return $user;
    }

    public function createUser(Request $request){
        $name = $request->name;
        $email = $request->email;
        $username  = $request->username;
        $password = $request->password;    
        $employee_role_id = $request->type;

        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee");

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->post($endPointUsers ,[
              "name" => $name,
              "email" => $email,   
              "username" => $username,
              "password" => $password, 
              "employee_role_id" => $employee_role_id,
              "active" => 1,
            ]);
            if($response->json('error')){
                return redirect('/adicionar_usuario')->with("msg_error", "Erro: Usuário ou senha já existem!");
               
            }else{
                return redirect('/adicionar_usuario')->with("msg", "Usuário criado com sucesso!");
            };    
        } catch (\Throwable $th) {
            return redirect('/adicionar_usuario')->with("msg_error", "Erro ao criar usuário");
        }
    }

    public function deleteUser($id, $username){

        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee");
            
            if(Session::get('username') == $username){
                return redirect('/usuarios')->with("msg_error", "Erro: O usuário a ser excluído é o mesmo que está logado!");
            }
            else{
                try {
                    $token = Session::get('token');
                    $response = Http::withToken(
                    $token
                    )->delete($endPointUsers ,["id" => $id]); 
    
                    return redirect('/usuarios')->with("msg", "Usuário excluido com sucesso!");
                } catch (\Throwable $th) {
                    return redirect('/usuarios')->with("msg_error", "Erro ao excluir usuário!");
            }
        }
    }

    public function editUser(Request $request){

        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $username  = $request->username;
        $password = $request->password;    
        $employee_role_id = $request->type;
        $active =  $request->active;

        $endPointUsers = HelperBaseUrlApi::baseUrlApi("employee");

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->patch($endPointUsers ,[
              "id" => $id,
              "name" => $name,
              "email" => $email,   
              "username" => $username,
              "password" => $password, 
              "employee_role_id" => $employee_role_id,
              "active" => $active,
            ]);

            if($response->json('error')){
                return redirect("/editar_usuario/$id")->with("msg_error", "Erro: Ao editar usuário!");
               
            }else{
                return redirect("/editar_usuario/$id")->with("msg", "Usuário editado com sucesso!");
            };    
        } catch (\Throwable $th) {
            return redirect("/editar_usuario/$id")->with("msg_error", "Erro na rota: editar usuário!");
        }

    }
}
