@extends('layouts.app')

@section('title', "Detalhes do produto")

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item active">
            <span class="lead">{{ $produto->nome }}</span>
        </li>
        <li class="list-group-item">
            <strong>Valor:</strong> R$ {{ $produto->valor }}
        </li>
        <li class="list-group-item">
            <strong>Descrição:</strong> {{ $produto->descricao }}
        </li>
        <li class="list-group-item">
            <strong>Quantidade:</strong> {{ $produto->quantidade }}
        </li>
    </ul>

    <a href="{{ route('lista_produtos') }}" class="btn btn-outline-primary">
        <i class="fas fa-arrow-left"></i> Retornar
    </a>
@endsection
