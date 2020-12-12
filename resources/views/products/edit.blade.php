@extends('layouts.app')

@section('title', 'Editar produto')

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <form action="/produtos/{{ $produto->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $produto->nome }}">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" step="0.01" min="0.05" name="valor" id="valor" class="form-control" value="{{ $produto->valor }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea rows="3" style="resize: none" name="descricao" id="descricao" class="form-control">{{ $produto->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" min="0" name="quantidade" id="quantidade" class="form-control" value="{{ $produto->quantidade }}">
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-sync-alt"></i> Editar
        </button>
        <a href="/produtos" class="btn btn-outline-success">
            <i class="fas fa-arrow-left"></i> Retornar
        </a>
    </form>
@endsection
