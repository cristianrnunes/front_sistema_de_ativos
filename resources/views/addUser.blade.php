@extends('layouts.main')
@section('title', 'Adicionar usuário')
@section('content')

<div class="container-fluid">
<div class="page-header">
   <h4 class="page-title">Adicionar usuário</h4>
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
         <a href="usuarios">Usuários</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Adicionar usuário</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <form action="criar_usuário" method="POST" id="exampleValidation" novalidate="novalidate">
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
                  <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Nome <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="text" class="form-control" id="name" name="name"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="username" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">usuário <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <div class="input-group">
                        <input type="text" class="form-control"  aria-label="username" aria-describedby="username-addon" id="username" name="username" required="">
                     </div>
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="email" class="form-control" id="email" name="email"  required="">
                  </div>
               </div>
               <div class="form-group form-show-validation row">
                  <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Senha <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <input type="password" class="form-control" id="password" name="password"  required="">
                  </div>
               </div>
               <!-- <div class="form-group form-show-validation row">
                  <label for="confirmpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Confirm Password <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                  	<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Enter Password" required="">
                  </div>
                  </div> -->
               <div class="form-group form-show-validation row">
                  <label for="birth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tipo <span class="required-label">*</span></label>
                  <div class="col-lg-4 col-md-9 col-sm-8">
                     <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option value="1">Administrador</option>
                        <option value="2">Padrão</option>
                     </select>
                  </div>
               </div>
            </div>
               <div class="card-action">
                  <div class="row">
                     <div class="col-md-12">
                        <input class="btn btn-success" type="submit" value="Feito!">
                        <a href="usuarios" class="btn btn-danger">Cancelar</a>
                     </div>
                  </div>
               </div>
         </form> 
      </div>
   </div>
</div>
@endsection