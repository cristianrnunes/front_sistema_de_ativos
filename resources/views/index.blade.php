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

    <div class="col-sm-6 col-md-3">
        <a href="/painel/users" style="text-decoration: none;">
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
                                <h4 class="card-title">1</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
        <a href="/painel/products" style="text-decoration: none;">
            <div class="card card-stats card-info card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="flaticon-box"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Produtos</p>
                                <h4 class="card-title">3</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-3">
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
    </div>
</div>

@endsection