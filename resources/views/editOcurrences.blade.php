@extends('layouts.main')
@section('title', 'Editar Ocorrência')
@section('content')
<div class="container-fluid">
<div class="page-header">
   <h4 class="page-title">Editar Ocorrência</h4>
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
         <a href="ocorrencias">Ocorrências</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Editar Ocorrência</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <form action="/update_ocorrencia" method="POST" id="exampleValidation" novalidate="novalidate">
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
               @foreach($assets as $a)
               @if($a->id == $ocorrencia->asset_id)
               <div class="form-group form-show-validation row">
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">ativo</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="{{$a->id}}" name="asset_id" value="{{$a->name}}" disabled required="">
                  </div>
               </div>
               @endif
               @endforeach
               <div class="form-group form-show-validation row">
                  <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <textarea  name="description" class="form-control" rows="3" required="">{{$ocorrencia->description}}</textarea>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data e hora </label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="date_time" name="date_time" value="{{$ocorrencia->date_time}}" disabled required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Resgistrar ação:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <textarea name="action_notes" class="form-control" rows="5" required="">{{$ocorrencia->action_notes}}</textarea>
                  </div>
               </div>
            </div>
            <input type="text" name="id" value="{{$ocorrencia->id}}" hidden>
            <div class="card-action">
               <div class="row">
                  <div class="col-md-12">
                     @if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1)
                     <input class="btn btn-success" type="submit" value="Feito!">
                     @endif
                     <a href="/ocorrencias" class="btn btn-danger">Cancelar</a>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection