@extends('layouts.main')
@section('title', 'Ativos')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Gestor de Ativos</h4>
                <div class="ml-auto">
                @if(Session::has('p_reg_employees') && Session::get('p_reg_employees') == 1)
                <a href="adicionar_ativo" class="btn btn-primary btn-round " data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Adicionar ativo
                </a>
                @endif
                <a href="/manutencoes" class="btn btn-info btn-border btn-round" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Manutenções
                </a>
                </div>
              
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
            @if( $actives != 0)
            <div class="table-responsive">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <!-- <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div id="add-row_filter" class="dataTables_filter">
                                <label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row" /></label>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100.688px;">Código</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Equipamento</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 154.656px;">Preço</th>
                                        <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Setor</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Responsável</th>
                                        <th style="width: 30.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actives as $active)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$active->id}}</td>
                                        <td>{{$active->name}}</td>
                                        <td>{{$active->actual_value}}</td>
                                        <td>{{HelperAux::getSectorById($active->sector_id)}}</td>
                                        <td>{{HelperAux::getUserById($active->employee_id)}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_ativo/{{$active->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
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
            <h4>Não existem ativos cadastrados!</h4>
            @endif
        </div>
    </div>
</div>

@endsection

