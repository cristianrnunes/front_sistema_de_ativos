@extends('layouts.main')
@section('title', 'Adicionar setor')
@section('content')

<div class="container-fluid">
<div class="page-header">
   <h4 class="page-title">Adicionar setor</h4>
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
         <a href="/setores">Setores</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Adicionar setor</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <form action="/update_sector" method="POST" id="exampleValidation" novalidate="novalidate">
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
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Novo Nome <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="name" name="name" value="{{$sector->name}}"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="description" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nova breve descrição <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="text" class="form-control"  aria-label="description" aria-describedby="description-addon" id="description" name="description" value="{{$sector->description}}" required="">
                     </div>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="phone" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Novo Telefone <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="phone" class="form-control" id="phone" name="phone" value="{{$sector->phone}}" required="">
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
            <input type="text" name="id" value="{{$sector->id}}" hidden>
               <div class="card-action">
                  <div class="row">
                     <div class="col-md-12">
                        <input class="btn btn-success" type="submit" value="Feito!">
                        <a href="/setores" class="btn btn-danger">Cancelar</a>
                     </div>
                  </div>
               </div>
         </form> 
      </div>
   </div>
</div>
@endsection