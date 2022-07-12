@extends('layouts.main')
@section('title', 'Usários')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Usuários</h4>
                <a href="adicionar_usuario" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Adicionar usuário
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
            @if($users != 0)
            <div class="table-responsive">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <!-- <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="add-row_length">
                                <label>
                                    Mostrar
                                    <select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    registros
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-12 col-md-6">
                            <div id="add-row_filter" class="dataTables_filter">
                                <label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row" /></label>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tabelaUsuarios" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Usuário</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Tipo</th>
                                        <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Status</th>
                                        <th style="width: 30.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if($user->username == Session::get('username'))
                                    <tr role="row" class="odd" style="background-color:#b5c9bb;">
                                        <td class="sorting_1">{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        @if($user->employee_role_id == 1)
                                        <td>Administrador</td>
                                        @else
                                        <td>Padrão</td>
                                        @endif
                                        @if($user->active == 1)
                                        <td>Ativo</td>
                                        @else
                                        <td>Inativo</td>
                                        @endif
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_usuario/{{$user->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <!-- <button type="button" onclick=" openModal()" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </button> -->
                                                <!-- <a href="deletar_usuario/{{$user->id}}/{{$user->username}}" type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        @if($user->employee_role_id == 1)
                                        <td>Administrador</td>
                                        @else
                                        <td>Padrão</td>
                                        @endif
                                        @if($user->active == 1)
                                        <td>Ativo</td>
                                        @else
                                        <td>Inativo</td>
                                        @endif
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_usuario/{{$user->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <!-- <button type="button" onclick=" openModal()" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </button> -->
                                                <!-- <a href="deletar_usuario/{{$user->id}}/{{$user->username}}" type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </a> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="add-row" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="add-row" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>   
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            @else
            <h4>Não existem usuários cadastrados!</h4>
            @endif
        </div>
    </div>
</div>

@endsection

