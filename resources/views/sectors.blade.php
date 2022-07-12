@extends('layouts.main')
@section('title', 'Setores')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Setores</h4>
                <a href="adicionar_setor" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Adicionar setor
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
            @if($sectors != 0)
            <div class="table-responsive">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tabelaSetores" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Nome</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Descrição</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Telefone</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30.641px;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sectors as $sector)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$sector->name}}</td>
                                        <td>{{$sector->description}}</td>
                                        <td>{{$sector->phone}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_setor/{{$sector->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                                <!-- <a href="deletar_setor/{{$sector->id}}" type="button" data-toggle="tooltip" title="Remover" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="la la-times"></i>
                                                </a> -->
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
            <h4>Não existem setores cadastrados!</h4>
            @endif
        </div>
    </div>
</div>

@endsection

