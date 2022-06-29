@extends('layouts.main')
@section('title', 'Adicionar Ocorrência')
@section('content')

<div class="container-fluid">
<div class="page-header">
   <h4 class="page-title">Adicionar Ocorrência</h4>
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
         <a href="#">Adicionar Ocorrência</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <form action="criar_ocorrencia" method="POST" id="exampleValidation" novalidate="novalidate">
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
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Ativo <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="asset_id" id="exampleFormControlSelect1">
                           <option value="">Selecione um ativo</option>   
                           @foreach($assets as $a)
                           <option value="{{$a->id}}">{{$a->name}}</option>
                           @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
						<label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Descrição:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                  <textarea name="description" class="form-control" rows="3" required=""></textarea>
                  </div>
					</div>
               <div class="form-group form-show-validation row">
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Data e hora <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="datetime-local" class="form-control" id="date_time" name="date_time"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
						<label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Resgistrar ação:</label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                  <textarea name="action_notes" class="form-control" rows="5" required=""></textarea>
                  </div>
					</div>
            </div>
               <div class="card-action">
                  <div class="row">
                     <div class="col-md-12">
                        <input class="btn btn-success" type="submit" value="Feito!">
                        <a href="/ocorrencias" class="btn btn-danger">Cancelar</a>
                     </div>
                  </div>
               </div>
         </form> 
      </div>
   </div>
</div>
@endsection