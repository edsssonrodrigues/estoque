@extends('layouts.app')

@section('title', 'Listagem de produtos')

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <a href="{{ route('form_cria_produto') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Novo produto
    </a>

    @if(count($produtos))
        @if(!empty($mensagem))
            <div class="alert alert-primary">
                {{ $mensagem }}
            </div>
        @endif

        <ul class="list-group">
            @foreach($produtos as $produto)
                <li class="list-group-item d-flex justify-content-between align-items-center {{ $produto->quantidade <= 1 ? 'text-danger' : '' }}">
                    <strong>
                        {{ $produto->nome }}
                    </strong>

                    <div class="options">
                        <a href="produtos/{{ $produto->id }}" class="btn btn-sm btn-primary mr-2">
                            <i class="fas fa-search text-white"></i>
                        </a>
                        <a href="produtos/{{ $produto->id }}/edit" class="btn btn-sm btn-success mr-2">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                        <a
                            href="#"
                            class="btn btn-sm btn-danger btn-delete"
                            data-toggle="modal"
                            data-target="#delete-modal"
                            data-id="{{ $produto->id }}"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
            @endforeach
        </ul>
    @else
        <h5>Sem produtos cadastrados no momento.</h5>
    @endif

    <!-- Delete modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Remover produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja remover o produto?</p>
                </div>
                <div class="modal-footer">
                    <form action="" method="POST" id='form-delete'>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                            <i class="fas fa-ban"></i> Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Remover
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/products/remove-product.js') }}"></script>
@endsection
