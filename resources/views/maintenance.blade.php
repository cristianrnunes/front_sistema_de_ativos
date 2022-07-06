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
         <form action="criar_manutencao" method="POST">
         @csrf
         <div class="form-group form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Ativo <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="asset_id" id="exampleFormControlSelect1">
                           <option value="">Selecione um ativo</option>   
                           @foreach(HelperAux::getAllActives() as $a)
                           <option value="{{$a->id}}">{{$a->name}}</option>
                           @endforeach
                     </select>
                  </div>
               </div>
         <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:<span class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
               <textarea name="description" class="form-control" rows="5" required=""></textarea>
            </div>
         </div>
         <div class="form-show-validation row">
            <label for="date_time" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Proxima manutenção (em dias) <span class="required-label">*</span></label>
            <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
               <div class="input-group">
                  <input type="datetime-local" class="form-control" id="date_time" name="date_time" required="">
               </div>
            </div>
         </div>
         <div class="form-show-validation row">
            <label for="time_to_complete" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempo de serviço em horas <span class="required-label">*</span></label>
            <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
               <div class="input-group">
                  <input type="number" class="form-control" id="time_to_complete" name="time_to_complete" required="">
               </div>
            </div>
            </div>  
            <div class="form-group form-show-validation row">
               <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Observações:<span class="required-label">*</span></label>
               <div class="col-lg-4 col-md-9 col-sm-8">
                  <textarea name="action_notes" class="form-control" rows="3" required=""></textarea>
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
         </form>
         <div class="container table-responsive">
            <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
               <div class="row">
                  <div class="col-sm-12">
                     <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                        <thead>
                           <tr role="row">
                              <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 108.688px;">Data / hora</th>
                              <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 154.656px;">Equipamento</th>
                              <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Descrição</th>
                              <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Situação</th>
                              <th style="width: 30.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($maintenance as $m)
                           <tr role="row" class="odd">
                              <td class="sorting_1">{{$m->date_time}}</td>
                              @foreach(HelperAux::getAllActives() as $active)
                              @if($m->asset_id == $active->id)
                              <td>{{$active->name}}</td>
                              @endif
                              @endforeach
                              <td>
                                {{$m->description}}
                              </td>
                              <td>
                                 @if($m->status == 0)
                                 <span style="color:red"> Pendente</span>
                                 @elseif($m->status == 1)
                                 <span style="color:orange"> Em andamento</span>
                                 @else
                                 <span style="color:green"> Finalizado</span>
                                  @endif
                              </td>
                              <td>
                                 <div class="form-button-action">
                                    <a href="editar_manutencao/{{$m->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                       <i class="la la-edit"></i>
                                    </a>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
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