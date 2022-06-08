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
            <!-- Modal -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header no-bd">
                            <h5 class="modal-title">
                                <span class="fw-mediumbold"> New</span>
                                <span class="fw-light">
                                    Row
                                </span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="addName" type="text" class="form-control" placeholder="fill name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Office</label>
                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer no-bd">
                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
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
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="add-row_filter" class="dataTables_filter">
                                <label>Pesquisar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="add-row" /></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Usuário</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Tipo</th>
                                        <th style="width: 103.016px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">teste</td>
                                        <td>teste</td>
                                        <td>teste</td>
                                        <td>teste</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_usuario" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <button type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="add-row" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="add-row" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection