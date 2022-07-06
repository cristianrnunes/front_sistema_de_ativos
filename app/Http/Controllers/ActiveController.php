<?php

namespace App\Http\Controllers;

use App\Helpers\HelperBaseUrlApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ActiveController extends Controller
{
    public function index (){

        $dataActives = $this->getActives();

        

        return view('actives', [
            'actives' => json_decode($dataActives),
        ]);
    }

    public function getActives(){
        $endPointSectors = HelperBaseUrlApi::baseUrlApi("asset"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointSectors);
    
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return $response;
        }else{
            return 0;
        }
    }

    public function viewAddActives(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
        return view('addActive');
        }else{
            return redirect('/actives');
        }
    }

    public function createActive(Request $request){
        
        $name = $request->name;
        $description = $request->description;
        $purchase_date = $request->purchase_date;
        $start_use_date = $request->start_use_date;
        $purchase_value = $request->purchase_value;
        $actual_value = $request->actual_value;
        $sector_id = $request->sector_id;
        $employee_id = $request->employee_id;
        $depreciation_rule = "";
        $maintence_interval = $request->maintence_interval;
        $standard_maintence_time = 0;

        $endPointAssets = HelperBaseUrlApi::baseUrlApi("asset"); 

        
            
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->post($endPointAssets ,[
              "name" => $name,
              "description" => $description,   
              "purchase_date" => $purchase_date,
              "start_use_date" => $start_use_date,
              "purchase_value" => $purchase_value,
              "actual_value" => $actual_value,
              "sector_id" => $sector_id,
              "employee_id" => $employee_id,
              "depreciation_rule"  => $depreciation_rule,
              "maintence_interval" => $maintence_interval,
              "standard_maintence_time" => $standard_maintence_time,

            ]);
            
        if($response->json() != 0 ){
            return redirect('/adicionar_ativo')->with("msg", "Ativo criado com sucesso!"); 
        }else{
            return redirect('/adicionar_ativo')->with("msg_error", "Erro ao adicionar novo ativo");
        }   
       
    }

    public function viewEditActive($id){
        
        $active = $this->getActiveById($id);

         //Pega todos os ativos        
         $endPointOcurrence = HelperBaseUrlApi::baseUrlApi("ocurrence");
         $token = Session::get('token');
         $response = Http::withToken(
             $token
         )->get($endPointOcurrence);
         $dataOcurrences = $response;

        return view('editActive', [
            'id' => $id,
            'active' => $active,
            'ocurrences' =>  json_decode($dataOcurrences)
        ]);
    }

    public function getActiveById($id){

        $token = Session::get('token');

        $endPointAssets = HelperBaseUrlApi::baseUrlApi("asset"); 

        $response = Http::withToken(
            $token
        )->get( $endPointAssets);

        $actives = json_decode($response);
    
        $active='';
        foreach ($actives as $u) {
            if($u->id == $id){
                $active = $u;
            }
        }

        return $active;
    }

    public function viewEditMaintenance(){
        return view('maintenance');
    }

    public function editActive (Request $request){
        $id = $request->id;
        $name = $request->name;
        $description = $request->description;
        $purchase_date = $request->purchase_date;
        $start_use_date = $request->start_use_date;
        $purchase_value = $request->purchase_value;
        $actual_value = $request->actual_value;
        $sector_id = $request->sector_id;
        $employee_id = $request->employee_id;
        $depreciation_rule = "";
        $maintence_interval = $request->maintence_interval;
        $standard_maintence_time = 0;

        $endPointAssets = HelperBaseUrlApi::baseUrlApi("asset"); 

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->patch($endPointAssets ,[
                "name" => $name,
                "description" => $description,   
                "purchase_date" => $purchase_date,
                "start_use_date" => $start_use_date,
                "purchase_value" => $purchase_value,
                "actual_value" => $actual_value,
                "sector_id" => $sector_id,
                "employee_id" => $employee_id,
                "depreciation_rule"  => $depreciation_rule,
                "maintence_interval" => $maintence_interval,
                "standard_maintence_time" => $standard_maintence_time,
            ]);

            
                return redirect("/editar_ativo/$id")->with("msg", "Ativo editado com sucesso!");    
        } catch (\Throwable $th) {
            return redirect("/editar_ativo/$id")->with("msg_error", "Erro na rota: editar ativo!");
        }

    }
}


