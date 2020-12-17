@extends('layouts.app')

@section('title', "Detalhes da categoria")

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item active">
            <span class="lead">{{ $categoria->nome }}</span>
        </li>
    </ul>

    <a href="{{ route('lista_categorias') }}" class="btn btn-outline-primary">
        <i class="fas fa-arrow-left"></i> Retornar
    </a>
@endsection
