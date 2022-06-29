<?php

namespace App\Http\Controllers;

use App\Helpers\HelperBaseUrlApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OcurrencesController extends Controller
{
    public function index(){

        //Pega todos os ativos        
        $endPointActive = HelperBaseUrlApi::baseUrlApi("asset");
        $token = Session::get('token');
        $response = Http::withToken(
            $token
        )->get($endPointActive);
        $assets = $response;

        $dataOcurrences = $this->getOcurrence();
        return view('ocurrences', [
           'ocurrences' => json_decode($dataOcurrences) ,
           'assets' => json_decode($assets)
        ]);
    }

    public function getOcurrence(){
        $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("ocurrence"); 
        $token = Session::get('token');

        $response = Http::withToken(
            $token
        )->get($endPointOcurrences);
    
        if(is_countable(json_decode($response)) && sizeof(json_decode($response)) > 0){
            return $response;
        }else{
            return 0;
        }
    }

     public function viewAddOcorrences(){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){

         //Pega todos os ativos        
         $endPointActive = HelperBaseUrlApi::baseUrlApi("asset");
         $token = Session::get('token');
         $response = Http::withToken(
             $token
         )->get($endPointActive);
         $assets = $response;
 
            
        return view('addOcurrences', [
            'assets' => json_decode($assets)
        ]);
        }else{
            return redirect('/');
        }
     }

     public function createOcorrence(Request $request){
        $asset_id = $request->asset_id;
        $description = $request->description;
        $date_time = $request->date_time;
        $action_notes = $request->action_notes;
        $status = 0;
        $value = 0;

        $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("ocurrence");

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->post($endPointOcurrences,[
                "asset_id" => $request->asset_id,
                "description" => $request->description,
                "date_time" => $request->date_time,
                "action_notes" => $request->action_notes,
                "status" => 0,
                "value" => 0,
            ]);
            
            return redirect('/adicionar_ocorrencia')->with("msg", "Ocorrência adicionada com sucesso!");    
        } catch (\Throwable $th) {
            return redirect('/adicionar_ocorrencia')->with("msg_error", "Erro ao criar ocorrência");
        }
    }

    public function viewEditOcorrence($id){
        if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1){
           
            //Pega todos os ativos        
            $endPointActive = HelperBaseUrlApi::baseUrlApi("asset");
            $token = Session::get('token');
            $response = Http::withToken(
             $token
            )->get($endPointActive);
            
            $assets = $response;
           
            $ocorrencia = $this->getOcorrencesById($id);

            return view('editOcurrences',[
                'id' => $id,
                'ocorrencia' => $ocorrencia,
                'assets' =>  json_decode($assets)
            ]);
        
        }else{
            return redirect('/');
        }
    }

    
    public function getOcorrencesById($id){

        $token = Session::get('token');

        $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("ocurrence");

        $response = Http::withToken(
            $token
        )->get($endPointOcurrences);

        $ocorrences = json_decode($response);
    
        $ocoren ='';
        foreach ($ocorrences as $u) {
            if($u->id == $id){
                $ocoren = $u;
            }
        }
        return $ocoren;
    }

    public function editOcorrence(Request $request){

        $id = $request->id;
        // $asset_id = $request->asset_id;
        $description = $request->description;
        // $date_time = $request->date_time;
        $action_notes = $request->action_notes;
        $status = 0;
        $value = 0;

        $endPointOcurrences = HelperBaseUrlApi::baseUrlApi("ocurrence");

        try {
            $token = Session::get('token');

            $response = Http::withToken(
                $token
            )->patch($endPointOcurrences,[
                "id" => $id,
                // "asset_id" => $asset_id,
                "description" => $description,
                // "date_time" => $date_time,
                "action_notes" => $action_notes,
                "status" => $status,
                "value" => $value,
            ]);
            
            return redirect("/editar_ocorrencia/$id")->with("msg", "Ocorrência editada com sucesso!");    
        } catch (\Throwable $th) {
            return redirect("/editar_ocorrencia/$id")->with("msg_error", "Erro ao editar ocorrência");
        }

    }
}
