<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Produto;
use App\Categoria;

class ProdutoController extends Controller
{
    // retorna todos os todos os produtos na base de dados
    public function index(Request $request)
    {
        $produtos = Produto::orderBy('id', 'DESC')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('products.index', compact('produtos', 'mensagem'));
    }

    // retorna a view para criação de um novo produto
    public function create()
    {
        $categorias = Categoria::orderBy('id', 'DESC')->get();
        return view('products.create', compact('categorias'));
    }

    // retorna um único produto, por meio de seu Id
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('products.show', compact('produto'));
    }

    // recebe os dados da request e salva o produto na base de dados
    public function store(ProdutoRequest $request)
    {
        $produto = Produto::create($request->all());
        $request->session()->flash('mensagem', "Produto {$produto->nome} adicionado com sucesso!");
        return redirect('/produtos');
    }

    // retorna a view para alteração de um produto produto existente
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('products.edit', compact('produto'));
    }

    // altera um produto existente na base de dados, por meio de seu Id
    public function update(Request $request, $id) {
        $produto = Produto::find($id);
        $produto->update($request->all());
        $request->session()->flash('mensagem', "Produto {$produto->nome} editado com sucesso!");
        return redirect('/produtos');
    }

    // remove um produto existente na base de dados, por meio de seu Id
    public function destroy(Request $request, $id)
    {
        $produto = Produto::find($id);
        $request->session()->flash('mensagem', "Produto {$produto->nome} removido com sucesso!");
        $produto->delete();
        return redirect('/produtos');
    }
}
