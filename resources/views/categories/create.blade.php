@extends('layouts.app')

@section('title', 'Nova categoria')

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

    <form action="{{ route('cria_categoria') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
        </div>
        <a href="{{ route('lista_categorias') }}" class="btn btn-outline-primary">
            <i class="fas fa-ban"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-check-circle"></i> Adicionar
        </button>
    </form>
@endsection
