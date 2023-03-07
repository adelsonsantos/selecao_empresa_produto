@extends('adminlte::page')

@section('title', 'Status do Pedido')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Status do Pedido</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Status do Pedido</li>
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
                <button class="btn btn-primary btn-xs float-right" onclick="window.location = '{{ route('status-pedido.create') }}'">
                    <i class="fa fa-plus"></i> Novo
                </button>
            </div>
              <div class="card-body">

              <div class="d-flex justify-content-center">{{ $status_pedidos->links() }}</div>
                    <div class="row">
                        <div class="col-md-6">Qtde. registros: {{ $status_pedidos->total() }}</div>
                        <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $status_pedidos->count() }}</div>
                    </div>
                    
                    @if(count($status_pedidos) > 0)

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Status</th>                                        
                                        <th class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($status_pedidos as $status_pedido)
                                    <tr>
                                    <td>{{ $status_pedido->nome }}</td>      
                                        <td class="text-center">
                                            <a href="{{ route('status-pedido.edit', $status_pedido->id) }}"><i class="fa fa-edit"></i> Editar</a>
                                            <a href="#" onclick="$('#form_exclusao').attr('action', '{{ route('status-pedido.destroy', $status_pedido->id) }}')" data-toggle="modal" data-target="#modalConfirmDestroy"><i class="fa fa-times"></i> Excluir</a>
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
                            <div class="col-md-6">Qtde. registros: {{ $status_pedidos->total() }}</div>
                            <div class="col-md-6 text-right">Qtde. registros p/ página: {{ $status_pedidos->count() }}</div>
                        </div>
                        <div class="d-flex justify-content-center">{{ $status_pedidos->links() }}</div>
                    @else
                        <div class="alert alert-info"><i class="fas fa-exclamation"></i> Nenhum dado localizado para os parâmetros indicados.</div>
                    @endif
              </div>
          </div>
    </div>
</div>
@stop

@section('js')
    <script type="text/javascript">
        
        function limparFiltro() {
            $('.select').val("");                  
        }
    </script>
@stop