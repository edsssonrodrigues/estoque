<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    // retorna todos os todos os produtos na base de dados
    public function index()
    {
        $produtos = Produto::orderBy('id', 'DESC')->get();
        return view('products.index', compact('produtos'));
    }

    // retorna a view para criação de um novo produto
    public function create()
    {
        return view('products.create');
    }

    // retorna um único produto, por meio de seu Id
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('products.show', compact('produto'));
    }

    // recebe os dados da request e salva o produto na base de dados
    public function store(Request $request)
    {
        $request->flashOnly(['nome']);
        $produto = Produto::create($request->all());
        return redirect('/produtos')->withInput();
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
        return redirect('/produtos');
    }

    // remove um produto existente na base de dados, por meio de seu Id
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect('/produtos');
    }
}
