@extends('layouts.app')

@section('title', 'Listagem de produtos')

@section('content')
    <h1 class="mt-3 mb-3">@parent</h1>

    <a href="{{ route('form_cria_produto') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle"></i> Novo produto
    </a>

    {{-- trigger modal --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete-modal">
        Modal
    </button> --}}

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



  <!-- Modal -->
  <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header text-danger">
          <h5 class="modal-title" id="exampleModalLabel">Deseja remover o produto?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Produto X
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
            <i class="fas fa-ban"></i> Cancelar
          </button>
          <button type="button" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i> Remover
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/products/remove-products.js') }}"></script>
@endsection
