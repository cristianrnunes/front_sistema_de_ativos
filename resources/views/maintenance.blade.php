@extends('layouts.main')
@section('title', 'Manutenção')
@section('content')

<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <div class="d-flex align-items-center">
            <h4 class="card-title">Manutenções</h4>
            <a onclick="addManu()" href="#" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Adicionar manutenção
                </a>
         </div>
      </div>
      <div class="card-body">
         @if(session('msg_error'))
         <div id="div-msg" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('msg_error')}}
         </div>
         @endif
         @if(session('msg'))
         <div id="div-msg" class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('msg')}}
         </div>
         @endif
         @if(0 == 0)
         <div id="addMaintenance" style="display: none;">
         <h6 class="mt-4 col-12 text-left ml-md-12 ml-sm-0">Adicionar nova manutenção</h6>
                  <br>
                  <div class="form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Agendar nova manutenção <span class="required-label">*</span></label>
                  <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="date" class="form-control" id="birth" name="birth" required="">
                     </div>
                  </div>
                  </div>
                  <div class="form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Equipamento <span class="required-label">*</span></label>
                  <div class="mb-4 col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option value="1">sdfsdf</option>
                        <option value="2">sdfsdfd</option>
                     </select>
                  </div>
               </div>
               <div class="card-action">
                  <div class="row">
                     <div class="col-md-12">
                        <input class="btn btn-success" type="submit" value="Feito!">
                        <a onclick="addManu()" href="#" class="btn btn-danger">Cancelar</a>
                     </div>
                  </div>
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
         @else
         <h4>Não existem manutenções cadastrados!</h4>
         @endif
      </div>
   </div>
</div>
<script>
  function addManu(){
   $("#addMaintenance").toggle()
  }
</script>

@endsection

