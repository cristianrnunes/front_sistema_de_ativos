@extends('layouts.main')
@section('title', 'Início')
@section('content')


<!-- @if(session('msg'))
<div id="div-msg" class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('msg')}}
</div>
@endif -->
<div class="page-header">
    <h4 class="page-title">Painel geral</h4>
</div>

<div class="row">
    @if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1)
       <div class="col-sm-6 col-md-3">
        <a href="/setores" style="text-decoration: none;">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-desk"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Setores</p>
                                <!-- <h4 class="card-title">0</h4> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="/usuarios" style="text-decoration: none;">
            <div class="card card-stats card-primary card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Usuários</p>
                                <!-- <h4 class="card-title">0</h4> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif

    <!-- <div class="col-sm-6 col-md-3">
        <a href="/painel/services" style="text-decoration: none;">
            <div class="card card-stats card-secondary card-round">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Serviços</p>
                                <h4 class="card-title">6</h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div> -->
</div>
@if(session('msg'))
    <div id="div-msg" data-notify="container" class="col-10 col-xs-11 col-sm-4 alert alert-info" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; padding-left: 65px; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; bottom: 20px; right: 20px;">
    <span data-notify="icon" class="flaticon-hands"></span> 
    <span data-notify="title">Olá</span> 
    <span data-notify="message">{{session('msg')}}!</span>
</div> 
@endif

@endsection
