@extends('layouts.main')
@section('title', 'Editar usuário')
@section('content')
<div class="container-fluid">
   <div class="page-header">
      <h4 class="page-title">Editar manutenção</h4>
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
            <a href="/manutencoes">Manutenção</a>
         </li>
         <li class="separator">
            <i class="flaticon-right-arrow"></i>
         </li>
         <li class="nav-item">
            <a href="#">Editar manutenção</a>
         </li>
      </ul>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            @if(session('msg_error'))
            <div id="div-msg" class="alert alert-warning alert-dismissible fade show" role="alert">
               {{session('msg_error')}}
            </div>
            @endif
            @if(session('msg'))
            <div id="div-msg" class="alert alert-success alert-dismissible fade show" role="alert">
               {{session('msg')}}
            </div>
            @endif
            <div class="container" >
               <form action="/update_manutencao" method="POST">
                  @csrf
                  <div class="mt-4 form-group form-show-validation row">
                     <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Ativo</label>
                     <div class="col-lg-4 col-md-9 col-sm-8">
                        <select class="form-control" name="asset_id" id="exampleFormControlSelect1" disabled>
                           @foreach(HelperAux::getAllActives() as $a)
                           @if($a->id == $manutencao->asset_id)
                           <option value="{{$manutencao->asset_id}}">{{$a->name}}</option>
                           @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
            </div>
            <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:<span class="required-label">*</span></label>
            <div class="col-lg-4 col-md-9 col-sm-8">
            <textarea name="description" class="form-control" rows="5" required="">{{$manutencao->description}}</textarea>
            </div>
            </div>
            <div class="form-show-validation row">
            <label for="date_time" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Proxima manutenção (em dias) <span class="required-label">*</span></label>
            <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
            <div class="input-group">
            <input type="datetime-local" value="{{$manutencao->date_time}}" class="form-control" id="{{$manutencao->description}}" name="date_time" required="">
            </div>
            </div>
            </div>
            <div class="form-show-validation row">
            <label for="time_to_complete" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tempo de serviço em horas <span class="required-label">*</span></label>
            <div class="mb-5 col-lg-4 col-md-9 col-sm-8">
            <div class="input-group">
            <input type="number" value="{{$manutencao->time_to_complete}}" class="form-control" id="time_to_complete" name="time_to_complete" required="">
            </div>
            </div>
            </div>  
            <div class="form-group form-show-validation row">
            <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Observações:</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
            <textarea name="action_notes" class="form-control" rows="3" >{{$manutencao->action_notes}}</textarea>
            </div>
            </div>
            <div class="mb-4 form-group form-show-validation row">
            <label for="status" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Ativo</label>
            <div class="col-lg-4 col-md-9 col-sm-8">
            <select class="form-control" name="status" id="exampleFormControlSelect1">
            <option value="0" @if($manutencao->status == 0) selected @endif style="color: red">Pendente</option>   
            <option value="1" @if($manutencao->status == 1) selected @endif style="color:orange">Em andamento</option>
            <option value="2" @if($manutencao->status == 2) selected @endif style="color:green">Finalizada</option>
            </select>
            </div>
            </div>
         </div>
         <input type="text" name="id" value="{{$manutencao->id}}" hidden> 
         <div class="col-md-12">
         <input class="btn btn-success" type="submit" value="Feito!">
         <a  href="/manutencoes" class="btn btn-danger">Cancelar</a>
         </div>
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
</div>
@endsection