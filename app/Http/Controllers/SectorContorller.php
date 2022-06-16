<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helpers\HelperBaseUrlApi;
use Illuminate\Support\Facades\Http;

class SectorContorller extends Controller
{
    public function index(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
            $dataSectors = $this->getSectors();
            return view('sectors', [
                'sectors' => json_decode($dataSectors),
            ]);
        }else{
            return redirect('/');
        }    
    }

    public function getSectors(){
        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointSectors);
    
        // dd($response->json());
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return $response;
        }else{
            return 0;
        }
    }
    
    public function viewAddSectors(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
        return view('addSector');
        }else{
            return redirect('/');
        }
    }
    
    public function viewEditSectors($id){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
           
            $sector = $this-> getSectorById($id);

            return view('editSector',[
                'id' => $id,
                'sector' =>  $sector
            ]);
        
        }else{
            return redirect('/');
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

        return $sector;
    }

    public function createSectors(Request $request){
        $name = $request->name;
        $description = $request->description;
        $phone  = $request->phone;
        

        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); 

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->post($endPointSectors ,[
              "name" => $name,
              "description" => $description,   
              "phone" => $phone,
            ]);
                return redirect('/adicionar_setor')->with("msg", "Setor criado com sucesso!");    
        } catch (\Throwable $th) {
            return redirect('/adicionar_setor')->with("msg_error", "Erro ao criar Setor");
        }
    }

    public function deleteSector($id){
        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); $endPointUsers = HelperBaseUrlApi::baseUrlApi("sector");
            try {
                $token = Session::get('token');

                $response = Http::withToken(
                $token
                )->delete($endPointSectors ,["id" => $id]); 

                return redirect('/setores')->with("msg", "Setor excluido com sucesso!");
            } catch (\Throwable $th) {
                return redirect('/setores')->with("msg_error", "Erro ao excluir setor!");
        }
    }

    public function editSectors(Request $request){

        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $phone = $request->phone;
        
        $endPointSectors = HelperBaseUrlApi::baseUrlApi("sector"); 

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->patch($endPointSectors ,[
              "id" => $id,
              "name" => $name,
              "description" => $description,
              "phone" => $phone,   
            ]);
            return redirect("/editar_setor/$id")->with("msg", "Setor editado com sucesso!");    
        } catch (\Throwable $th) {
            return redirect("/editar_setor/$id")->with("msg_error", "Erro na rota: editar setor!");
        }

    }
}
