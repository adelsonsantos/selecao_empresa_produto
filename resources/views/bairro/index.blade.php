@extends('adminlte::page')

@section('title', 'Bairros')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Bairros</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Bairros</li>
            </ol>
        </div>
  </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Listagem</h3> 
                <button class="btn btn-primary btn-xs float-right" onclick="window.location = '{{ route('bairro.create') }}'">
                    <i class="fa fa-plus"></i> Novo
                </button>
            </div>
              <div class="card-body">
                    
                    @if(count($bairros) > 0)
                        <div class="d-flex justify-content-center">{{ $bairros->links() }}</div>
                        <div class="row">
                            <div class="col-md-6">Qtde. registros: {{ $bairros->total() }}</div>
                            <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $bairros->count() }}</div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Estado</th>
                                        <th>Cidade</th>
                                        <th>Bairro</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bairros as $plano)
                                    <tr>
                                        <td>{{ $plano->estado }}</td>
                                        <td>{{ $plano->cidade }}</td>
                                        <td>{{ $plano->bairro }}</td>
                                        <td>{{ $plano->latitude }}</td>
                                        <td>{{ $plano->longitude }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('bairro.edit', $plano->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a href="#" onclick="$('#form_exclusao').attr('action', '{{ route('bairro.destroy', $plano->id) }}')" data-toggle="modal" data-target="#modalConfirmDestroy"><i class="fa fa-times"></i> Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <x-adminlte-modal id="modalConfirmDestroy" title="Confirmação" size="sm" theme="default"
                            icon="fas fa-exclamation-triangle" v-centered static-backdrop scrollable>
                            Confirma a exclusão do registro ?
                            <x-slot name="footerSlot">
                                <form id="form_exclusao" action="#" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-success" type="submit">Confirmar</button>
                                </form>
                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
                            </x-slot>
                        </x-adminlte-modal>
                    
                        <div class="row">
                            <div class="col-md-6">Qtde. registros: {{ $bairros->total() }}</div>
                            <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $bairros->count() }}</div>
                        </div>
                        <div class="d-flex justify-content-center">{{ $bairros->links() }}</div>
                    @else
                        <div class="alert alert-info"><i class="fas fa-exclamation"></i> Nenhum dado localizado para os parâmetros indicados.</div>
                    @endif
              </div>
          </div>
    </div>
</div>
@stop