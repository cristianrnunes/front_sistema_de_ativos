<?php

namespace App\Http\Controllers;

use App\Helpers\HelperBaseUrlApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class MaintencesController extends Controller
{


    public function index (){

        $dataManu = $this->getMaintences();

        return view('maintenance', [
            'maintenance' => json_decode($dataManu),
        ]);
    }

    public function getMaintences(){
        $endPointManu = HelperBaseUrlApi::baseUrlApi("maintence"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointManu);
    
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return $response;
        }else{
            return 0;
        }
    }
    
public function createMaintence(Request $request){
    $asset_id = $request->asset_id;
    $description = $request->description;
    $date_time = $request->date_time;
    // dd( $date_time);
    $action_notes = $request->action_notes;
    $time_to_complete = $request->time_to_complete;
    //STATUS =>  0 : Pendente | 1 : em atendimento | 2 : Finalizada
    $status = 0;
    $value = 0;

    $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("maintence");

  
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->post($endPointOcurrences,[
            "asset_id" => $asset_id,
            "description" => $description,
            "date_time" => "'$date_time'",
            "action_notes" => $action_notes,
            "time_to_complete" => $time_to_complete,
            "status" => 0,
            "value" => 0,
        ]);
        
        if($response->json() != 0 ){
            return redirect('/manutencoes')->with("msg", "Manutenção criada com sucesso!"); 
        }else{
            return redirect('/manutencoes')->with("msg_error", "Erro ao adicionar nova Manutenção");
        }   
       
}

public function viewEditMaintence($id){
    if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
       
        //Pega todas as manutenções      
        $endPointManu = HelperBaseUrlApi::baseUrlApi("maintence");
        $token = Session::get('token');
        $response = Http::withToken(
         $token
        )->get($endPointManu);
        
        $manu = $response;
          
        foreach (json_decode($manu) as $value) {
          
            if($id == $value->id){
                $manutencao = $value;
            }
        }

        return view('editMaintenance',[
            'id' => $id,
            'manutencao' => $manutencao
            // 'manu' =>  json_decode($manu)
        ]);
    
    }else{
        return redirect('/');
    }
}

public function editMaintence(Request $request){
    $id = $request->id;
    // $asset_id = $request->asset_id;
    $description = $request->description;
    $date_time = $request->date_time;
    $action_notes = $request->action_notes;
    $time_to_complete = $request->time_to_complete;
    //STATUS =>  0 : Pendente | 1 : em atendimento | 2 : Finalizada
    $status = $request->status ;
    $value = 0;

    $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("maintence");

        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->patch($endPointOcurrences,[
            "id" => $id,
            // "asset_id" => $asset_id,
            "description" => $description,
            "date_time" => "'$date_time'",
            "action_notes" => $action_notes,
            "time_to_complete" => $time_to_complete,
            "status" => $status,
            "value" => 0,
        ]);
        
        if($response->json() != 0 ){
            return redirect('/manutencoes')->with("msg", "Manutenção editada com sucesso!"); 
        }else{
            return redirect("/editar_manutencao/$id")->with("msg_error", "Nenhum campo foi alterado!");
        }   
       
}


}
