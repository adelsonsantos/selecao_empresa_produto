@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>categoria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Categoria</a></li>
                <li class="breadcrumb-item active">@if(isset($categoria)) Edição @else Cadastro @endif</li>
            </ol>
        </div>
  </div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-default">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title">
                      {{ isset($categoria) ? "Edição" : "Cadastro" }}
                    </h3>
                </div>
            </div>
              <div class="card-body">
                @if(isset($categoria))
                  <form role="form" method="POST"  name="form2"   action="{{ route('categoria.update', $categoria->id) }}">
                  
                    @method('PUT')
                @else
                  <form role="form" method="POST" action="{{ route('categoria.store') }}">
                @endif
                    @csrf
                    <div class="card-body">

                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <x-adminlte-input id="nome" name="nome" placeholder="Descrição da Categoria" value="{{ $categoria->nome ?? old('nome') }}" />
                      </div>

                      <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <x-adminlte-textarea name="descricao" id="descricao">
                          {{ $categoria->descricao ?? old('descricao') }}
                        </x-adminlte-textarea>
                      </div>
                                                                  
                    </div>
                    <div class="card-footer">
                      <button type="button" onclick="window.location='{{ url()->previous() }}'" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</button>
                      <button type="submit" class="btn btn-primary">
                        @if(isset($plano))
                        <i class="fa fa-edit"></i> Alterar
                        @else
                        <i class="fa fa-save"></i> Salvar
                        @endif
                      </button>
                    </div>
                  </form>
              </div>
          </div>
    </div>
</div>
@stop