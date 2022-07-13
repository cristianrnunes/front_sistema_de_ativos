@extends('layouts.main')
@section('title', 'Adicionar ativo')
@section('content')

<div class="container-fluid">
<div class="page-header">
   <h4 class="page-title">Adicionar ativo</h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="/">
         <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="/ativos">ativos</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Adicionar ativo</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <form action="criar_ativo" method="POST" id="exampleValidation" novalidate="novalidate">
            @csrf
            <div class="card-body">
            @if(session('msg'))
            <div id="div-msg" class="alert alert-success alert-dismissible fade show" role="alert">
               {{session('msg')}}
            </div>
            @endif
            @if(session('msg_error'))
            <div id="div-msg" class="alert alert-danger alert-dismissible fade show" role="alert">
               {{session('msg_error')}}
            </div>
            @endif
               <div class="form-group form-show-validation row">
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Equipamento <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="name" name="name"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
						<label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                  <textarea  name="description" class="form-control" rows="5" required=""></textarea>
                  </div>
					</div>
               <div class="form-group form-show-validation row">
                  <label for="purchase_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data da compra:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="date" class="form-control" id="purchase_date" name="purchase_date"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="start_use_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data de início do uso:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="date" class="form-control" id="start_use_date" name="start_use_date"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="purchase_value" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Valor<span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="purchase_value" name="purchase_value"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="actual_value" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Valor atual<span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="actual_value" name="actual_value"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="maintence_interval" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Intervalo de manutenção</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="maintence_interval" value="180" name="maintence_interval"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Setor <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="sector_id" id="exampleFormControlSelect1">
                     @if(HelperAux::getAllSectors() == null)
                     <option value="">Sem setores cadastrados</option>
                     @else
                     @foreach(HelperAux::getAllSectors() as $sector)   
                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                     @endforeach
                     @endif
                     </select>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Responsável</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="employee_id" id="exampleFormControlSelect1">
                        @if(HelperAux::getAllUsers() == null)
                        <option value="">Sem usuários cadastrados</option>
                        @else
                        @foreach(HelperAux::getAllUsers() as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
               </div>

             <!-- <div class="text-center mt-5">
               <label>Digite um valor</label>
                  <input id="inputValue" type="text"/>
                  <a class="btn btn-warning" onclick="geraBarcode()">Gerar código de barras</a>
            </div> 

            <img  id="barcode"/> -->
            <!-- </div> -->
            <!-- <div class="form-group form-show-validation row">
						<h6 class="col-12 text-center">Cadastrar ação:</h>
				</div>
            
               <div class="mb-5 col-12 text-center">
                  <a onclick="isActive('manu')" class="btn btn-info btn-border  show mr-4" id="btn-manu" data-toggle="pill"  role="tab" aria-selected="true">Manutenções</a>
                  <a onclick="isActive('depre')" class="btn btn-info btn-border  show" id="btn-depre" data-toggle="pill"  role="tab" aria-selected="true">Depreciação</a>
               </div> --> 
			
            <!-- Manutenção preventiva -->
            <!-- <div id="box-manu" style="display: none;" class="text-center form-group form-show-validation row" >
               <h6 class="col-12 text-left ml-md-5 ml-sm-0">Manutenção</h6><br>
               <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agendar a primeira manutenção <span class="required-label">*</span></label>
               <div class="col-lg-4 col-md-9 col-sm-8">
                  <div class="input-group">
                     <input type="date" class="form-control" id="birth" name="birth" required="">
                  </div>
               </div>
            </div> -->
            <!-- Depresiação -->
            <!-- <div id="box-depre" style="display: none;" >
               <div class="text-center form-group form-show-validation row" >
               <h6 class="col-12 text-left ml-md-5 ml-sm-0">Depreciação</h6><br>
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data da primeira depreciação <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="date" class="form-control" id="birth" name="birth" required="">
                     </div>
                  </div>
               </div>
                <div class="text-center form-group form-show-validation row" >
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Porcentagem sobre o valor <br> atual do produto "%"<span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="number" class="form-control" id="porcentagem" name="porcentagem" required="">
                     </div>
                  </div>
               </div>
            </div>  -->
               <div class="card-action">
                  <div class="row">
                     <div class="col-md-12">
                        <input class="btn btn-success" type="submit" value="Feito!">
                        <a href="/ativos" class="btn btn-danger">Cancelar</a>
                     </div>
                  </div>
               </div>
         </form> 
      </div>
   </div>
</div>

<!-- <script src="assets/js/JsBarcode.all.min.js"></script> -->
<script>

// function geraBarcode(){
//    let codigo = document.querySelector("#inputValue");
// //   JsBarcode("#barcode", codigo.value, {
// //   format: "pharmacode",
// //   lineColor: "#000",
// //   width:6,
// //   height:40,
// //   displayValue: false
// //    });

// JsBarcode("#barcode")
//   .options({font: "OCR-B"}) // Will affect all barcodes
// //   .EAN13("1234567890128", {fontSize: 18, textMargin: 0})
//   .blank(20) // Create space between the barcodes
//   .EAN5(codigo.value, {height: 85, textPosition: "top", fontSize: 16, marginTop: 15})
//   .render();
// }

function isActive(value){

   if(value == "manu"){

      let isVisible = $("#box-depre").is(":visible");
      if(isVisible){
         $("#box-depre").toggle()
      }

      $("#box-manu").toggle();

   }else{

      let isVisible = $("#box-manu").is(":visible");
      if(isVisible){
         $("#box-manu").toggle()
      }

      $("#box-depre").toggle()
   }
}
</script>

<style>
.btn-color-active{
   background-color: #007bff;
   color: #fff;
}
</style>
@endsection

