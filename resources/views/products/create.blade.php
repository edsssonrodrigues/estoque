@extends('layouts.app')

@section('title', 'Novo produto')

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/produtos" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" min="0.05" name="valor" id="valor" class="form-control" value="{{ old('valor') }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea rows="3" style="resize: none" name="descricao" id="descricao" class="form-control">{{ old('descricao') }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" min="1" name="quantidade" id="quantidade" class="form-control" value="{{ old('quantidade') }}">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control" value="{{ old('categoria') }}">
                <option value="">Selecione uma categoria</option>
            </select>
        </div>
        <a href="{{ route('lista_produtos') }}" class="btn btn-outline-primary">
            <i class="fas fa-ban"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Adicionar
        </button>
    </form>
@endsection
