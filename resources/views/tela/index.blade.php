@extends('adminlte::page')

@section('title', 'Telas')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Telas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Telas</li>
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
                <button class="btn btn-primary btn-xs float-right" onclick="window.location = '{{ route('tela.create') }}'">
                    <i class="fa fa-plus"></i> Novo
                </button>
            </div>
              <div class="card-body">
                    
                    <div class="d-flex justify-content-center">{{ $telas->links() }}</div>
                    <div class="row">
                        <div class="col-md-6">Qtde. registros: {{ $telas->total() }}</div>
                        <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $telas->count() }}</div>
                    </div>
                    
                    @if(count($telas) > 0)

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Modulo</th>
                                        <th>Rota</th>
                                        <th>Ícone</th>
                                        <th>Dt. Inclusão</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($telas as $tela)
                                    <tr>
                                        <td>{{ $tela->nome }}</td>
                                        <td>{{ $tela->modulo->nome ?? '' }}</td>
                                        <td>{{ $tela->rota }}</td>
                                        <td class="text-center"><i class="{{ $tela->icone }}"></i></td>
                                        <td>{{ Carbon\Carbon::parse($tela->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tela.edit', $tela->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a href="#" onclick="$('#form_exclusao').attr('action', '{{ route('tela.destroy', $tela->id) }}')" data-toggle="modal" data-target="#modalConfirmDestroy"><i class="fa fa-times"></i> Excluir</a>
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
                            <div class="col-md-6">Qtde. registros: {{ $telas->total() }}</div>
                            <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $telas->count() }}</div>
                        </div>
                        <div class="d-flex justify-content-center">{{ $telas->links() }}</div>
                    @else
                        <div class="alert alert-info"><i class="fas fa-exclamation"></i> Nenhum dado localizado para os parâmetros indicados.</div>
                    @endif
              </div>
          </div>
    </div>
</div>
@stop