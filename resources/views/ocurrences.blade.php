@extends('layouts.main')
@section('title', 'Ocorrências')
@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Ocorrências</h4>
                <a href="adicionar_ocorrencia" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                    <i class="la la-plus"></i>
                    Adicionar Ocorrência
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
            <div class="table-responsive">
                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30.688px;">Código</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 238.688px;">Ativo</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 354.656px;">Descrição</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 186.641px;">Data/hora</th>
                                        <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30.641px;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($ocurrences)
                                    @foreach($ocurrences as $o)
                                    <tr role="row" class="odd">
                                        @foreach($assets as $asset)
                                        @if ($asset->id == $o->asset_id)
                                        <td class="sorting_1"> {{$asset->id}} </td>
                                        <td class="sorting_1"> {{$asset->name}} </td>
                                        @endif
                                        @endforeach
                                        <td>{{$o->description}}</td>
                                        <td>{{$o->date_time}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="editar_ocorrencia/{{$o->id}}" type="button" data-toggle="tooltip" title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="la la-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

