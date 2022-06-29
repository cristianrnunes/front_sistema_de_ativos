@extends('layouts.main')
@section('title', 'Editar ativo')
@section('content')

<div class="container-fluid">
   <div class="page-header">
      <h4 class="page-title">Editar ativo</h4>
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
            <a href="#">Editar ativo</a>
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
                        <input type="text" class="form-control" id="name" name="name" value="{{$active->name}}"  required="">
                     </div>
                  </div>
                  <div class="form-group form-show-validation row">
                     <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:</label>
                     <div class="col-lg-4 col-md-9 col-sm-8">
                        <textarea  name="description" class="form-control" rows="5" required="" >{{$active->description}}</textarea>
                     </div>
                  </div>
                  <div class="form-group form-show-validation row">
                  <label for="purchase_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data da compra:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input disabled type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{$active->purchase_date}}"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="start_use_date" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data de início do uso:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input disabled type="date" class="form-control" id="start_use_date" name="start_use_date"  value="{{$active->start_use_date}}"  required="">
                  </div>
               </div>
                  <div class="form-group form-show-validation row">
                  <label for="purchase_value" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Valor de compra<span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input disabled type="text" class="form-control" id="purchase_value" name="purchase_value" value="{{$active->purchase_value}}"  required="">
                  </div>
               </div>
                  <div class="form-group form-show-validation row">
                     <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Valor atual<span class="required-label">*</span></label>
                     <div class="col-lg-4 col-md-9 col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="{{$active->actual_value}}" required="">
                     </div>
                  </div>
                  <div class="form-group form-show-validation row">
                     <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Responsável <span class="required-label">*</span></label>
                     <div class="col-lg-4 col-md-9 col-sm-8">
                        <select class="form-control" name="type" id="exampleFormControlSelect1">
                           <option value="">Cristian</option>
                           <option value="">Pedro</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group form-show-validation row">
                     <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Setor <span class="required-label">*</span></label>
                     <div class="col-lg-4 col-md-9 col-sm-8">
                        <select class="form-control" name="type" id="exampleFormControlSelect1">
                           <option value="1">RH</option>
                           <option value="2">Desenvolvimento</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group form-show-validation row container" style="justify-content: end !important">
                  <div class="form-check" style="background-color:#e9e9e9; border-radius:10px">
                     <h6>Status</label><h6>
                     <label class="form-radio-label">
                     <input class="form-radio-input" type="radio" name="active" value="1"  >
                     <span class="form-radio-sign">Ativo</span>
                     </label>
                     <label class="form-radio-label ml-3">
                     <input class="form-radio-input" type="radio" name="active" value="0">
                     <span class="form-radio-sign">Inativo</span>
                     </label>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <h6 class="col-12 text-center">
                  Gerenciar ações:</h>
               </div>
               <div class="mb-5 col-12 text-center">
                  <!-- <a onclick="isActive('manu')" class="btn btn-info btn-border  show mr-4" id="btn-manu" data-toggle="pill"  role="tab" aria-selected="true">Manutenções</a> -->
                  <!-- <a onclick="isActive('depre')" class="btn btn-info btn-border  show" id="btn-depre" data-toggle="pill"  role="tab" aria-selected="true">Depreciações</a> -->
                  <a  onclick="openOcorrecias()" class="btn btn-info btn-border ">Ocorrências</a>
               </div>
               <!-- Manutenção preventiva -->
               <div id="box-manu" style="display: none;" class="text-center form-group form-show-validation row" >
                  <h6 class="col-12 text-left ml-md-5 ml-sm-0">Adicionar manutenção</h6>
                  <br>
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agendar nova manutenção <span class="required-label">*</span></label>
                  <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="date" class="form-control" id="birth" name="birth" required="">
                     </div>
                  </div>
                  <div class="container table-responsive">
                     <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12 col-md-12">
                              <div id="add-row_filter" class="dataTables_filter">
                                 <label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row" /></label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Data</th>
                                       <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Equipamento</th>
                                       <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Status</th>
                                       <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr role="row" class="odd">
                                       <td class="sorting_1">121212</td>
                                       <td>Pendente</td>
                                       <td>
                                          <div class="form-group">
                                             <select class="form-control form-control-sm" id="smallSelect">
                                                <option>Pendente</option>
                                                <option>Em andamento</option>
                                                <option>Finalizado</option>
                                             </select>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-button-action">
                                             <a href="editar_ativo" type="button" data-toggle="tooltip" title="Salvar" class="btn btn-link btn-success btn-lg" data-original-title="Edit Task">
                                             <i class="la la-check"></i>
                                             </a>
                                             <a href="deletar_ativo/id" type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                             <i class="la la-times"></i>
                                             </a>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Depresiação -->
               <div id="box-depre" style="display: none;" >
                  <div class="text-center form-group form-show-validation row" >
                     <h6 class="col-12 text-left ml-md-5 ml-sm-0">Adicionar depreciação</h6>
                     <br>
                     <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data da depreciação <span class="required-label">*</span></label>
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
                  <h6 class="col-12 text-center mb-5">Valor atual do equipamento: R$ 123,00</h6>
                  <div class="container table-responsive">
                     <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                           <div class="col-sm-12 col-md-12">
                              <div id="add-row_filter" class="dataTables_filter">
                                 <label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row" /></label>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30.688px;">Data</th>
                                       <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Porcentagem </th>
                                       <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Valor</th>
                                       <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr role="row" class="odd">
                                       <td class="sorting_1">121212</td>
                                       <td>10%</td>
                                       <td>
                                          R$ 10
                                       </td>
                                       <td>
                                          <div class="form-button-action">
                                             <a href="editar_ativo" type="button" data-toggle="tooltip" title="Salvar" class="btn btn-link btn-success btn-lg" data-original-title="Edit Task">
                                             <i class="la la-check"></i>
                                             </a>
                                             <a href="deletar_ativo/id" type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                             <i class="la la-times"></i>
                                             </a>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="ocorrencias" class="table-responsive" style="display: none; padding-bottom:30px">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30.688px;">Código</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Ativo</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Descrição</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Data/hora</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30.641px;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ocurrences as $o)
                                    @if($id == $o->asset_id)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"> {{$active->id}} </td>
                                        <td class="sorting_1"> {{$active->name}} </td>
                                        <td>{{$o->description}}</td>
                                        <td>{{$o->date_time}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/editar_ocorrencia/{{$o->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
</div>


<script>
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
function openOcorrecias(){
   $("#ocorrencias").toggle();
}
</script>

<style>
.btn-color-active{
   background-color: #007bff;
   color: #fff;
}
</style>
@endsection

