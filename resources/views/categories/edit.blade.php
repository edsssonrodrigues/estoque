@extends('layouts.app')

@section('title', 'Editar categoria')

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

    <form action="/categorias/{{ $categoria->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $categoria->nome }}">
        </div>
        <a href="{{ route('lista_categorias') }}" class="btn btn-outline-success">
            <i class="fas fa-ban"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-sync-alt"></i> Editar
        </button>
    </form>
@endsection
