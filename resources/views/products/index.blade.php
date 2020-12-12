@extends('layouts.app')

@section('title', 'Listagem de produtos')

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <a href="/produtos/create" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Novo produto
    </a>

    @if(!empty($mensagem))
        <div class="alert alert-primary">
            {{ $mensagem }}
        </div>
    @endif

    <div class="table-responsive table-responsive-lg">
        <table class="table table-bordered table-sm table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor (R$)</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr class="{{ $produto->quantidade <= 1 ? 'text-danger' : '' }}">
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->quantidade }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="produtos/{{ $produto->id }}" class="btn btn-sm btn-primary mr-2">
                                    <i class="fas fa-search text-white"></i>
                                </a>
                                <a href="produtos/{{ $produto->id }}/edit" class="btn btn-sm btn-success mr-2">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                                <form action="produtos/{{ $produto->id }}" method="POST" class="mr-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
